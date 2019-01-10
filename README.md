# imagecolorallocatefromstring

[![MIT License](https://img.shields.io/badge/license-MIT-0366d6.png?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADYAAAAcCAYAAAAqckyNAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAGxJREFUWIXt1tEJgDAMAFErbpT9N+hO+m0pokVoL9z7UypyBCUlIs6trzTXq517tI88RGAYjWE0x8R3t3+/oXO11u79tBMzjGbmN/b3hnKTdmKG0RhGYxiNYTRfNo+32/gS0k7MMBrDaAyjuQCAGAo9rf4wcgAAAABJRU5ErkJggg==)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAABIZJREFUSImtVj1oHEcU/t7M7Ghvpb1F4n7EWZAjpyKQyrgLJhBCHILBOEWCSa+EBEuFK7cmrUDEhtgmJBBSBAIxdhkIbtKmUZwYY9QcCrLj06H/Pe3O7LwU1p5P1p5+sB8Mx+wM73vfN+/n6Pz582i1WiiXy0iSBFmWAQCICFJKZFkGYwyUUpBSjgsh7nqe92O73f4hCALcunULJzFx2KExBmEYotFogIiQJMmac+5da+33URT9HATBuROhHQWYZRm01qjX6zh16hSiKEKapu04juH7/iUp5W9Xrly5Nzc3N/1KgMzc/02SBEmSwPf9zyYnJ3+q1WqTtVoNExMTGB8fR6VSudBoNB4uLCxcPw6gKvpIRCCiMwDe0FrXmXkmTdPTzIwoiooC9Jxzs7dv355eWVm5dO3atc1jMWRmCCEipdS9Xq/359TU1K/T09Pfpml62hgDIoIx5sCy1sI5h93d3Y+iKHo8Pz9/9lDAXEIp5SdCiMdJklyoVCpoNpsAgHK5DCFEP4OHmXMOSql6qVT6Y35+vlkImKYpiKguhPidmX8xxtS01mi1WmBm9Ho9jIyMIAxDWGsPBSQiOOdgjIHW+oNCwEaj8WkQBA92d3ffd87lTAE8z1IigrUWQRAgCIIjWQ6AtwoBp6amvnHOVZ1zYGakadqXOLd8H0URiOhI0L0ga4WAxpjlXAZmRqVSQb1e78uTW5ZlkFKiXC6DmQ8E9XKARDRZdKaccy6XbGJiAqVSCczcBxg0ay1GR0dhjMH29jY8zysEzLIMQRC8ne8vX778eRAEhpn/VlJKVKtVBEEAAEiSBFJKENFQZ2EY9vvuy0EB/Tpu3Lx5s7y0tPT16Ojo3CBDaK1BREjTdKhMue2lPsrlMtbW1nL59t0RQsBa65aXlxeNMU0pJZgZzjkIY0zy7NkzACiMtsistSiVShgbG+uXihDPe8jA2+ooippCiP6b+76/Inzfr+zs7KDb7fYBiQhCCAghIKU8sHInYRiiVCrl+0wIAaVUv5SiKEIQBLDWIgzDf5vN5ntCSvkmEaHb7SKOY4yMjMA5hzRNC9tY3srSNIVzDmNjY9ja2kK73eY4jj/0PO8igO+EEP8QEarVKqSUWFxcPDszM/NYMXOWa9ztduH7PoQQWF9fP/A2RW8FAOvr67DWqm63++Dq1atPANwDgBs3brxVrVbPPH369L87d+60AUARETEzlFLo9XpYXV1FvV4vLO6ihpBnqtYazrk6gCf5+ezs7CMAj/YFaa1dyhlqrbGxsYHt7W34vt9nddjKWQKAUoXTbr8qWZZtDEolhMDq6irSND2Wg5OaICI9KJVSCkmSoNPpHLtMTgT48odc2p2dHWxubkJrfWjffGVA4EUddjod9Hq918p06J+ovQmfxXF83fO818ZyaFbsdZpzzrn7ADwi+nLY3YFxVTw+Bv0yc3VIQX/MzPf3GsFXSqlHhR5eBAdmjo8ElFL+xcxbADYAbAkhOsx80Vp7Nx9TcRzDGPMFEXUA5Hc3nHNbnud1tNbvZFnWzLLs4VGA/wNJvWYLC4mJ9AAAAABJRU5ErkJggg==)](https://packagist.org/packages/andrewgjohnson/imagecolorallocatefromstring/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagecolorallocatefromstring.png?colorB=0366d6&logo=github)](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues)

<p align="center"><a href="https://imagecolorallocatefromstring.org/" title=""><img src="https://imagecolorallocatefromstring.org/documentation/imagecolorallocatefromstring.org/images/avatar.png" alt="" title="" width="400" id="avatar" /></a></p>

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

There are [other examples](https://github.com/andrewgjohnson/imagecolorallocatefromstring/tree/master/examples) included in the GitHub repository and on [imagecolorallocatefromstring.org](https://imagecolorallocatefromstring.org/examples/).

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
