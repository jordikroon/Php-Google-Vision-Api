<?php

namespace Vision\Hydrator;

use Vision\Annotation\CropHintsAnnotation;
use Vision\Annotation\EntityAnnotation;
use Vision\Annotation\Error;
use Vision\Annotation\FaceAnnotation;
use Vision\Annotation\ImagePropertiesAnnotation;
use Vision\Annotation\SafeSearchAnnotation;
use Vision\Annotation\TextAnnotation;
use Vision\Annotation\WebDetection;
use Zend\Hydrator\Exception\LogicException;
use Zend\Hydrator\HydratorInterface;

class AnnotateImageHydrator implements HydratorInterface
{
    /**
     * @var array
     */
    protected $annotationClassMap = [
        'logoAnnotations' => EntityAnnotation::class,
        'labelAnnotations' => EntityAnnotation::class,
        'textAnnotations' => EntityAnnotation::class,
        'landmarkAnnotations' => EntityAnnotation::class,
        'imagePropertiesAnnotation' => ImagePropertiesAnnotation::class,
        'safeSearchAnnotation' => SafeSearchAnnotation::class,
        'cropHintsAnnotation' => CropHintsAnnotation::class,
        'faceAnnotations' => FaceAnnotation::class,
        'webDetection' => WebDetection::class,
        'fullTextAnnotation' => TextAnnotation::class,
        'error' => Error::class,
    ];

    /**
     * @var array
     */
    protected $hydratorClassMap = [
        'logoAnnotations' => SubAnnotationHydrator::class,
        'labelAnnotations' => SubAnnotationHydrator::class,
        'textAnnotations' => SubAnnotationHydrator::class,
        'landmarkAnnotations' => SubAnnotationHydrator::class,
        'faceAnnotations' => SubAnnotationHydrator::class,
        'imagePropertiesAnnotation' => AnnotationHydrator::class,
        'safeSearchAnnotation' => AnnotationHydrator::class,
        'cropHintsAnnotation' => AnnotationHydrator::class,
        'webDetection' => WebDetectionHydrator::class,
        'fullTextAnnotation' => TextAnnotationHydrator::class,
        'error' => AnnotationHydrator::class,
    ];

    /**
     * @var bool
     */
    protected $underscoreSeparatedKeys = false;

    /**
     * @param object $object
     * @return array
     */
    public function extract($object)
    {
        $array = [];
        $class = new \ReflectionClass($object);
        foreach ($class->getMethods() as $method) {
            $methodName = $method->name;
            if (!$this->canExtractMethod($object, $methodName)) {
                continue;
            }

            $annotation = lcfirst(substr($methodName, 3));

            /** @var HydratorInterface $hydrator */
            $hydrator = new $this->hydratorClassMap[$annotation];
            $array[$annotation] = array_filter($this->extractAnnotation($object->$methodName(), $hydrator));
        }

        return $array;
    }

    /**
     * @param object $object
     * @param string $methodName
     * @return bool
     */
    protected function canExtractMethod($object, $methodName)
    {
        return substr($methodName, 0, 3) === 'get'
            && isset($this->hydratorClassMap[lcfirst(substr($methodName, 3))])
            && !!$object->$methodName();
    }

    /**
     * @param array|object $arrayObject
     * @param HydratorInterface $hydrator
     * @return array
     */
    protected function extractAnnotation($arrayObject, HydratorInterface $hydrator)
    {
        if (is_object($arrayObject)) {
            return $hydrator->extract($arrayObject);
        }

        $map = [];
        foreach ($arrayObject as $annotation) {
            $map[] = $hydrator->extract($annotation);
        }

        return $map;
    }

    /**
     * @param array $data
     * @param object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        foreach ($data as $annotation => $value) {
            if (!isset($this->hydratorClassMap[$annotation], $this->annotationClassMap[$annotation])) {
                continue;
            }

            $hydrator = new $this->hydratorClassMap[$annotation];
            if (!$hydrator instanceof HydratorInterface) {
                throw new LogicException('Hydrator does not implement HydratorInterface');
            }

            $annotationObject = new $this->annotationClassMap[$annotation];
            $setter = 'set' . ucfirst($annotation);

            $object->$setter($hydrator->hydrate($value, $annotationObject));
        }

        return $object;
    }
}
