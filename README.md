# Silverstripe Elemental Gallery

[![CI](https://github.com/dynamic/silverstripe-elemental-gallery/actions/workflows/ci.yml/badge.svg)](https://github.com/dynamic/silverstripe-elemental-gallery/actions/workflows/ci.yml)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/v/stable)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/downloads)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![License](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/license)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)

## Requirements

- PHP: ^8.3
- silverstripe/recipe-plugin: ^2
- silverstripe/vendor-plugin: ^2
- dnadesign/silverstripe-elemental: ^6
- dynamic/silverstripe-elemental-baseobject: ^6

### Suggested Modules

- colymba/gridfield-bulk-editing-tools (^3): Provides bulk upload support

## Installation

`composer require dynamic/silverstripe-elemental-gallery`

## License

See [License](license.md)



## Example usage

Photo Gallery Element block allows you to display a collection of images. Click on the image thumbnail to open a larger version in Lightbox.

## Features

- Display a collection of images in a responsive gallery layout
- Bulk image upload support via Colymba's GridField Bulk Manager
- Automatic cascade deletion (images are removed when gallery is deleted)
- Automatic cascade duplication (images are copied when gallery is duplicated)
- Optional HTML content field for gallery description
- Lightbox integration for image viewing

## Screen Shots

#### Front End sample of a Gallery Element
![Front End sample of a Gallery Element](./docs/en/_images/gallery-block-sample.jpg)

#### Front End sample of a Gallery Element - Lightbox
![Front End sample of a Gallery Element](./docs/en/_images/gallery-block-sample-lightbox.jpg)

#### CMS - Gallery Main Tab
![CMS - Gallery Main Tab](./docs/en/_images/gallery-block-cms.jpg)

#### CMS - Gallery - Add/Edit Gallery Image
![CMS - Gallery Main Tab](./docs/en/_images/gallery-block-cms-add-image.jpg)


## Configuration

### Bulk Image Upload

This module supports bulk image uploads through the CMS. To enable this feature, ensure you have installed the recommended package:

```bash
composer require colymba/gridfield-bulk-editing-tools
```

Once installed, you'll see a bulk upload button in the gallery images grid field.

### Content Field

The gallery element includes an optional HTML content field that can be used to add a description or introduction text above the gallery.

## Getting more elements

See [Elemental modules by Dynamic](https://github.com/dynamic/silverstripe-elemental-blocks#getting-more-elements)

## Additional Configuration

See [SilverStripe Elemental Configuration](https://github.com/dnadesign/silverstripe-elemental#configuration)

## Maintainers

 *  [Dynamic](http://www.dynamicagency.com) (<dev@dynamicagency.com>)

## Bugtracker
Bugs are tracked in the issues section of this repository. Before submitting an issue please read over
existing issues to ensure yours is unique.

If the issue does look like a new bug:

 - Create a new issue
 - Describe the steps required to reproduce your issue, and the expected outcome. Unit tests, screenshots
 and screencasts can help here.
 - Describe your environment as detailed as possible: SilverStripe version, Browser, PHP version,
 Operating System, any installed SilverStripe modules.

Please report security issues to the module maintainers directly. Please don't file security issues in the bugtracker.

## Development and contribution
If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.
