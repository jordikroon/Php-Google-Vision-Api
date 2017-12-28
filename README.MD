Google Vision, PHP Client
=========================

[![Latest Stable Version](https://poser.pugx.org/jordikroon/google-vision/v/stable)](https://packagist.org/packages/jordikroon/google-vision)
[![Build Status](https://travis-ci.org/jordikroon/Php-Google-Vision-Api.svg?branch=master)](https://travis-ci.org/jordikroon/Php-Google-Vision-Api)
[![Dependency Status](https://www.versioneye.com/user/projects/588bdad0c64626002e5d6baf/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/588bdad0c64626002e5d6baf)
[![License](https://poser.pugx.org/jordikroon/google-vision/license)](https://packagist.org/packages/jordikroon/google-vision)

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
$response = $vision->request(
    // See a list of all image loaders in the table below
    new \Vision\Request\Image\LocalImage($imagePath)
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

| Name                                                                                | Constant                                  |
| :-----------------------------------------------------------------------------------| :---------------------------------------- |
| [LABEL_DETECTION](https://cloud.google.com/vision/docs/detecting-labels)            | \Vision\Feature::LABEL_DETECTION          |
| [TEXT_DETECTION](https://cloud.google.com/vision/docs/detecting-text)               | \Vision\Feature::TEXT_DETECTION           |
| [FACE_DETECTION](https://cloud.google.com/vision/docs/detecting-faces)              | \Vision\Feature::FACE_DETECTION           |
| [LANDMARK_DETECTION](https://cloud.google.com/vision/docs/detecting-landmarks)      | \Vision\Feature::LANDMARK_DETECTION       |
| [LOGO_DETECTION](https://cloud.google.com/vision/docs/detecting-logos)              | \Vision\Feature::LOGO_DETECTION           |
| [SAFE_SEARCH_DETECTION](https://cloud.google.com/vision/docs/detecting-safe-search) | \Vision\Feature::SAFE_SEARCH_DETECTION    |
| [IMAGE_PROPERTIES](https://cloud.google.com/vision/docs/detecting-properties)       | \Vision\Feature::IMAGE_PROPERTIES         |
| [WEB_DETECTION](https://cloud.google.com/vision/docs/detecting-web)                 | \Vision\Feature::WEB_DETECTION            |
| [CROP_HINTS](https://cloud.google.com/vision/docs/detecting-crop-hints)             | \Vision\Feature::CROP_HINTS               |
| [DOCUMENT_TEXT_DETECTION](https://cloud.google.com/vision/docs/detecting-fulltext)  | \Vision\Feature::DOCUMENT_TEXT_DETECTION  |

Available image loaders
------------------

| Image loader                                                                     | Description                                              |
| :--------------------------------------------------------------------------------| :------------------------------------------------------- |
| [\Vision\Request\Image\Base64Image](src/Request/Image/Base64Image.php)           | Loads Base64 encoded images                              |
| [\Vision\Request\Image\BinaryImage](src/Request/Image/BinaryImage.php)           | Loads binary images (file_get_contents or fopen)         |
| [\Vision\Request\Image\GoogleCloudImage](src/Request/Image/GoogleCloudImage.php) | Loads images from a Google Cloud bucket                  |
| [\Vision\Request\Image\LocalImage](src/Request/Image/LocalImage.php)             | Loads a locally stored image                             |
| [\Vision\Request\Image\RemoteImage](src/Request/Image/RemoteImage.php)           | Loads a remote (HTTP/HTTPS) image somewhere from the web |

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
Jordi Kroon | [Github](https://github.com/jordikroon) | [Twitter](https://twitter.com/jordi12100) | [jordikroon.nl](https://jordikroon.nl)

