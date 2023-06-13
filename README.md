# Silverstripe Elemental Gallery

[![CI](https://github.com/dynamic/silverstripe-elemental-gallery/actions/workflows/ci.yml/badge.svg)](https://github.com/dynamic/silverstripe-elemental-gallery/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-elemental-gallery/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-elemental-gallery)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/v/stable)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/downloads)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)
[![License](https://poser.pugx.org/dynamic/silverstripe-elemental-gallery/license)](https://packagist.org/packages/dynamic/silverstripe-elemental-gallery)

## Requirements

* dnadesign/silverstripe-elemental: ^5
* dynamic/silverstripe-elemental-baseobject: ^4

#### Optional

* colymba/gridfield-bulk-editing-tools ^3.0

## Installation

`composer require dynamic/silverstripe-elemental-gallery`

## License

See [License](license.md)

## Upgrading from version 2

Elemental Gallery drops `sheadawson/silverstripe-linkable` usage in favor of `gorriecoe/silverstripe-linkfield`. To avoid data loss, install the `dynamic/silverstripe-link-migrator` module as follows:

```markdown
composer require dynamic/silverstripe-link-migrator
```

Then, run the task "Linkable to SilverStripe Link Migration" via `/dev/tasks`, or cli via:
```markdown
vendor/bin/sake dev/tasks/LinkableMigrationTask
```

This will populate all of the new Link fields with data from the old class.

## Example usage

Photo Gallery Element block allows you to display a collection of images. Click on the image thumbnail to open a larger version in Lightbox.

## Screen Shots

#### Front End sample of a Gallery Element
![Front End sample of a Gallery Element](./docs/en/_images/gallery-block-sample.jpg)

#### Front End sample of a Gallery Element - Lightbox
![Front End sample of a Gallery Element](./docs/en/_images/gallery-block-sample-lightbox.jpg)

#### CMS - Gallery Main Tab
![CMS - Gallery Main Tab](./docs/en/_images/gallery-block-cms.jpg)

#### CMS - Gallery - Add/Edit Gallery Image
![CMS - Gallery Main Tab](./docs/en/_images/gallery-block-cms-add-image.jpg)


## Getting more elements

See [Elemental modules by Dynamic](https://github.com/orgs/dynamic/repositories?q=elemental&type=all&language=&sort=)

## Configuration

See [SilverStripe Elemental Configuration](https://github.com/dnadesign/silverstripe-elemental#configuration)

## Translations

The translations for this project are managed via [Transifex](https://www.transifex.com/dynamicagency/silverstripe-elemental-gallery/)
and are updated automatically during the release process. To contribute, please head to the link above and get
translating!

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
