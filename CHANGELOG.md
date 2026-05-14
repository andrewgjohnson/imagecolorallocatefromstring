# Changelog

All notable changes to the [imagecolorallocatefromstring project](https://github.com/andrewgjohnson/imagecolorallocatefromstring) will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/) and this project adheres to [Semantic Versioning](https://semver.org/).

## [v1.1.1](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases/tag/v1.1.1) (May 13, 2026)
 * Changed the font in the examples from Arial to [Noto Sans](https://fonts.google.com/noto/specimen/Noto+Sans) which uses the [SIL OFL 1.1](https://openfontlicense.org/open-font-license-official-text/)
 * Updated documentation website to replace deprecated `hljs.initHighlighting()` call with `hljs.highlightAll()` and removed obsolete Google Analytics script
 * Expanded unit tests to provide comprehensive coverage across hex formats, `rgb()`, `rgba()` with decimal and percentage alpha values, CSS color keywords, the `$alpha` parameter, whitespace trimming and error cases
 * Cleaned up source code by removing a redundant `rgb()` parsing branch, renaming `$webSafeColors` to `$cssColorKeywords`, renaming `$squareWidth`/`$squareHeight` to `$rectangleWidth`/`$rectangleHeight` in the examples, and correcting `E.G.` to `e.g.` in the docblock
 * Fixed documentation issues including grammar errors in README.md, a dead link in CONTRIBUTING.md (`help.github.com` updated to `docs.github.com`), removed defunct Gitter and Google+ platform references from CODE_OF_CONDUCT.md, and removed dead YUI library links from the documentation website

## [v1.1.0](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases/tag/v1.1.0) (May 9, 2026)
 * Added [Contribute](https://imagecolorallocatefromstring.agjgd.org/contribute/) page and updated [contributing guidelines](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/.github/CONTRIBUTING.md)
 * Added PHP_CodeSniffer support to enforce PSR-12 and PHP 5.0 compatibility
 * Added PHPUnit support for unit tests
 * Added `lint`, `lint:fix`, `phpunit` and `test` composer scripts
 * Added support for RGB colors, RGBA colors and CSS color keywords
 * Fixed support for older PHP versions; this project now truly supports PHP 5.0
 * Added [.gitattributes](https://github.com/andrewgjohnson/imagecolorallocatefromstring/blob/master/.gitattributes) file to help manage end-of-line characters
 * Added a `version_compare()` check before all `imagedestroy()` calls; the imagedestroy() function became an optional step that did nothing as of PHP 8.0 but as of PHP 8.5 when invoked it produces a deprecated notice
 * Fixed a number of broken links

## [v1.0.2](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases/tag/v1.0.2) (November 22, 2022)
 * Signed up for [Patreon](https://patreon.com/agjopensource) and added links to README.md
 * Added `.github` folder to unclutter the root directory
 * Added `CODEOWNERS` file
 * Added `FUNDING.yml` file
 * Added `SECURITY.md` file
 * Added `SUPPORT.md` file
 * Updated shields.io badge aesthetics on README.md
 * Removed the MIT logo from the shields.io badge for imagecolorallocatefromstring's license
 * Added Patrons shields.io badge to README.md
 * Enabled GitHub [discussions area](https://github.com/andrewgjohnson/imagecolorallocatefromstring/discussions) and now recommending it over StackOverflow
 * Removed `ISSUE_TEMPLATE.md` file for our single issue template and replaced with `ISSUE_TEMPLATE` folder to separate bug reports & feature requests within GitHub [issues](https://github.com/andrewgjohnson/imagecolorallocatefromstring/issues)
 * Updated [avatar image](https://imagecolorallocatefromstring.agjgd.org/documentation/imagecolorallocatefromstring.agjgd.org/images/avatar.png)
 * Moved all Twitter activity for all [agjgd projects](https://agjgd.org/projects/) (including imagecolorallocatefromstring) to the [@agjgdphp Twitter account](https://twitter.com/agjgdphp) as there were issues with the individual accounts being frozen
 * Changed documentation website to [imagecolorallocatefromstring.agjgd.org](https://imagecolorallocatefromstring.agjgd.org)
 * Updated copyright years to 2022

## [v1.0.1](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases/tag/v1.0.1) (December 15, 2018)
 * Launched online documentation at [imagecolorallocatefromstring.agjgd.org](https://imagecolorallocatefromstring.agjgd.org)

## [v1.0.0](https://github.com/andrewgjohnson/imagecolorallocatefromstring/releases/tag/v1.0.0) (December 9, 2018)
 * Initial release of imagecolorallocatefromstring
