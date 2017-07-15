<?php

namespace Vision\Hydrator;

use Zend\Hydrator\Exception\LogicException;
use Zend\Hydrator\HydratorInterface;

class AnnotateImageHydrator implements HydratorInterface
{
    /**
     * @var array
     */
    protected $annotationClassMap = [
        'logoAnnotations' => '\\Vision\\Annotation\\EntityAnnotation',
        'labelAnnotations' => '\\Vision\\Annotation\\EntityAnnotation',
        'textAnnotations' => '\\Vision\\Annotation\\EntityAnnotation',
        'landmarkAnnotations' => '\\Vision\\Annotation\\EntityAnnotation',
        'imagePropertiesAnnotation' => '\\Vision\\Annotation\\ImagePropertiesAnnotation',
        'safeSearchAnnotation' => '\\Vision\\Annotation\\SafeSearchAnnotation',
        'cropHintsAnnotation' => '\\Vision\\Annotation\\CropHintsAnnotation',
        'faceAnnotations' => '\\Vision\\Annotation\\FaceAnnotation',
        'error' => '\\Vision\\Annotation\\Error',
    ];

    /**
     * @var array
     */
    protected $hydratorClassMap = [
        'logoAnnotations' => '\\Vision\\Hydrator\\SubAnnotationHydrator',
        'labelAnnotations' => '\\Vision\\Hydrator\\SubAnnotationHydrator',
        'textAnnotations' => '\\Vision\\Hydrator\\SubAnnotationHydrator',
        'landmarkAnnotations' => '\\Vision\\Hydrator\\SubAnnotationHydrator',
        'faceAnnotations' => '\\Vision\\Hydrator\\SubAnnotationHydrator',
        'imagePropertiesAnnotation' => '\\Vision\\Hydrator\\AnnotationHydrator',
        'safeSearchAnnotation' => '\\Vision\\Hydrator\\AnnotationHydrator',
        'cropHintsAnnotation' => '\\Vision\\Hydrator\\AnnotationHydrator',
        'error' => '\\Vision\\Hydrator\\AnnotationHydrator',
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
