<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\DetectedLanguage;
use Zend\Hydrator\Strategy\StrategyInterface;

class DetectedLanguagesStrategy implements StrategyInterface
{
    /**
     * @param DetectedLanguage[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(DetectedLanguage $detectedLanguage) {
            return array_filter([
                'languageCode' => $detectedLanguage->getLanguageCode(),
                'confidence' => $detectedLanguage->getConfidence(),
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return DetectedLanguage[]
     */
    public function hydrate($value)
    {
        $detectedLanguageEntities = [];

        foreach ($value as $detectedLanguageInfo) {
            $detectedLanguageEntities[] = new DetectedLanguage(
                $detectedLanguageInfo['languageCode'],
                isset($detectedLanguageInfo['confidence']) ? $detectedLanguageInfo['confidence'] : null
            );
        }

        return $detectedLanguageEntities;
    }
}
