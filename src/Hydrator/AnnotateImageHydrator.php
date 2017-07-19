<?php

namespace Vision\Hydrator;

use Vision\Annotation\CropHintsAnnotation;
use Vision\Annotation\EntityAnnotation;
use Vision\Annotation\Error;
use Vision\Annotation\FaceAnnotation;
use Vision\Annotation\ImagePropertiesAnnotation;
use Vision\Annotation\SafeSearchAnnotation;
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
        'error' => AnnotationHydrator::class,
        'webDetection' => WebDetectionHydrator::class,
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
            if (substr($methodName, 0, 3) !== 'get') {
                continue;
            }

            $annotation = lcfirst(substr($methodName, 3));
            if (!array_key_exists($annotation, $this->hydratorClassMap)) {
                continue;
            }

            $annotationObject = $object->$methodName();
            if (!$annotationObject) {
                continue;
            }

            /** @var HydratorInterface $hydrator */
            $hydrator = new $this->hydratorClassMap[$annotation];

            $array[$annotation] = array_filter($this->extractAnnotation($annotationObject, $hydrator));
        }

        return $array;
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
            if (!array_key_exists($annotation, $this->hydratorClassMap) || !array_key_exists($annotation, $this->annotationClassMap)) {
                continue;
            }

            $setter = 'set' . ucfirst($annotation);

            $hydrator = new $this->hydratorClassMap[$annotation];
            if (!$hydrator instanceof HydratorInterface) {
                throw new LogicException('Hydrator does not implement HydratorInterface');
            }

            $annotation = new $this->annotationClassMap[$annotation];
            $object->$setter(
                $hydrator->hydrate($value, $annotation)
            );
        }

        return $object;
    }
}
