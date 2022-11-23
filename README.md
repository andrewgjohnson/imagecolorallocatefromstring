# imagecolorallocatefromstring

[![MIT License](https://img.shields.io/badge/license-MIT-0366d6.png?colorB=0366d6&style=flat-square)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&style=flat-square&logoColor=white&logo=packagist)](https://packagist.org/packages/andrewgjohnson/imagecolorallocatefromstring/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues)
[![Patreon](https://img.shields.io/endpoint.png?url=https%3A%2F%2Fshieldsio-patreon.vercel.app%2Fapi%3Fusername%3Dagjgd%26type%3Dpatrons&colorB=0366d6&style=flat-square&logoColor=white&logo=patreon)](https://patreon.com/agjgd)

<p align="center"><a href="https://imagecolorallocatefromstring.agjgd.org/" title=""><img src="https://imagecolorallocatefromstring.agjgd.org/documentation/imagecolorallocatefromstring.agjgd.org/images/avatar.png" alt="" title="" width="400" id="avatar" /></a></p>

## Description

**imagecolorallocatefromstring** is a function that will allocate a color based on a string for your PHP GD images.

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjgd)

**imagecolorallocatefromstring** is an [agjgd.org](https://agjgd.org) project.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager. You can find the imagecolorallocatefromstring package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagecolorallocatefromstring).

#### Install using Composer

Either run this command:

    composer require andrewgjohnson/imagecolorallocatefromstring

or add this to the `require` section of your composer.json file:

    "andrewgjohnson/imagecolorallocatefromstring": "1.*"

### Without Composer

To use without Composer add an [include](http://php.net/manual/function.include.php) to the [`imagecolorallocatefromstring.php` source file](https://raw.githubusercontent.com/andrewgjohnson/imagecolorallocatefromstring/master/source/imagecolorallocatefromstring.php).

    include_once 'source/imagecolorallocatefromstring.php';

## Examples

    // standard method to allocate a color for an image
    $red = imagecolorallocate($im, 0xFF, 0x00, 0x00);

    // these will all allocate the same color as the method above
    $alsoRed = imagecolorallocatefromstring($im, '#FF0000');
    $alsoRed = imagecolorallocatefromstring($im, '#Ff0000');
    $alsoRed = imagecolorallocatefromstring($im, '#ff0000');
    $alsoRed = imagecolorallocatefromstring($im, '#f00');
    $alsoRed = imagecolorallocatefromstring($im, 'f00');

There are [other examples](https://github.com/andrewgjohnson/imagecolorallocatefromstring/tree/master/examples) included in the GitHub repository and on [imagecolorallocatefromstring.agjgd.org](https://imagecolorallocatefromstring.agjgd.org/examples/).

## Help Requests

Please post any questions in the [discussions area](https://github.com/andrewgjohnson/imagecolorallocatefromstring/discussions) on GitHub if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues/new) on GitHub. When submitting an issue please use our [issue template](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/ISSUE_TEMPLATE.md).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/CONTRIBUTING.md) if you want to contribute.

You can contribute financially by becoming a [patron](https://patreon.com/agjgd) at [patreon.com/agjgd](https://patreon.com/agjgd) to support imagecolorallocatefromstring and [other agjgd.org projects](https://agjgd.org/projects/).

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjgd)

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [security policies and procedures](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/.github/SECURITY.md) comes via the [atomist/samples](https://github.com/atomist/samples/blob/master/SECURITY.md) project. Our [issue templates](https://github.com/andrewgjohnson/imagecolorallocatefromstring/tree/master/.github/ISSUE_TEMPLATE) comes via the [tensorflow/tensorflow](https://github.com/tensorflow/tensorflow/blob/master/SECURITY.md) project. Our [pull request template](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/.github/PULL_REQUEST_TEMPLATE.md) comes via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project. The [mountains photo](https://unsplash.com/photos/qJvpykJ5SKs) comes via [Gabriel Garcia Marengo](https://unsplash.com/@gabrielgm).

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/CHANGELOG.md).
