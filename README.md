# imagecolorallocatefromstring

[![MIT License](https://img.shields.io/github/license/andrewgjohnson/imagecolorallocatefromstring.png)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagecolorallocatefromstring.png)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagecolorallocatefromstring.png)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagecolorallocatefromstring.png)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagecolorallocatefromstring.png)](https://packagist.org/packages/andrewgjohnson/imagecolorallocatefromstring/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagecolorallocatefromstring.png)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues)

## Description

**imagecolorallocatefromstring** is a function that will allocate a color based on a string for your PHP GD images.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager.  You can find the imagecolorallocatefromstring package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagecolorallocatefromstring).

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

There are [other examples](https://github.com/andrewgjohnson/imagecolorallocatefromstring/tree/master/examples) included in the GitHub repository.

## Help Requests

Please post any questions on [stackoverflow.com](https://stackoverflow.com/search?q=imagecolorallocatefromstring) if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues/new) on GitHub.  When submitting an issue please use our [issue template](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/ISSUE_TEMPLATE.md).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/CONTRIBUTING.md) if you want to contribute.

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [issue template](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/ISSUE_TEMPLATE.md) & [pull request template](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/PULL_REQUEST_TEMPLATE.md) come via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project. The [mountains photo](https://unsplash.com/photos/qJvpykJ5SKs) comes via [Gabriel Garcia Marengo](https://unsplash.com/@gabrielgm).

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/CHANGELOG.md).
