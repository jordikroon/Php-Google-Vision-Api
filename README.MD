Google Vision, PHP Client
=========================

[![Build Status](https://travis-ci.org/jordikroon/Php-Google-Vision-Api.svg?branch=master)](https://travis-ci.org/jordikroon/Php-Google-Vision-Api)
[![Dependency Status](https://www.versioneye.com/user/projects/588bdad0c64626002e5d6baf/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/588bdad0c64626002e5d6baf)
## Instalation

The easiest way to install Google Vision is through [Composer](http://getcomposer.org).

```bash
composer require jordikroon/google-vision
```

Next is to obtain an API key through the [Google Cloud Platform](https://cloud.google.com). To get one visit the link below.
https://cloud.google.com/vision/docs/quickstart

Requirements
------------
 - [PHP >= 5.6](http://php.net/releases/5_6_0.php)
 - [Curl extension](http://php.net/manual/en/curl.installation.php)

Basic usage
-----------

```php
$vision = new \Vision\Vision(
    $apiKey, 
    [
        // See a list of all features in the table below
        // Feature, Limit
        new \Vision\Feature(\Vision\Feature::FACE_DETECTION, 100),
    ]
);

$imagePath = $_FILES['file']['tmp_name'];
$response = $vision->getRequest(
    new \Vision\Image($imagePath)
);

$faces = $response->getFaceAnnotations();
foreach ($faces as $face) {
    foreach ($face->getBoundingPoly()->getVertices() as $vertex) {
        echo sprintf('Person at position X %f and Y %f', $vertex->getX(), $vertex->getY());
    }
}
```

Available features
------------------

| Name                  | Constant                               | 
| :-------------------- | :------------------------------------- |
| LABEL_DETECTION       | \Vision\Feature::LABEL_DETECTION       |
| TEXT_DETECTION        | \Vision\Feature::TEXT_DETECTION        |
| FACE_DETECTION        | \Vision\Feature::FACE_DETECTION        |
| LANDMARK_DETECTION    | \Vision\Feature::LANDMARK_DETECTION    |
| LOGO_DETECTION        | \Vision\Feature::LOGO_DETECTION        |
| SAFE_SEARCH_DETECTION | \Vision\Feature::SAFE_SEARCH_DETECTION |
| IMAGE_PROPERTIES      | \Vision\Feature::IMAGE_PROPERTIES      |
| WEB_DETECTION         | \Vision\Feature::WEB_DETECTION         |
| CROP_HINTS            | \Vision\Feature::CROP_HINTS            |

To add a feature, add a `new \Vision\Feature` instance to features array used as second parameter. See [Basic Usage](#Basic-Usage) for a full example.
```php
new \Vision\Feature($feature, $maxResults);
```

Run tests
---------

```bash
$ composer install
$ ./vendor/bin/phpunit 
```

Authors
-------
Jordi Kroon | [Github](https://github.com/jordi12100) | [Twitter](https://twitter.com/jordi12100) | [jordikroon.nl](http://jordikroon.nl)
