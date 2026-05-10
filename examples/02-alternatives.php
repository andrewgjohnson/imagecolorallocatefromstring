<?php

/**
 * Imagecolorallocatefromstring Example (Alternatives)
 *
 * Copyright (c) 2018-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imagecolorallocatefromstring
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagecolorallocatefromstring
 */

// Include the imagecolorallocatefromstring source if you’re not using Composer
if (file_exists('../source/imagecolorallocatefromstring.php')) {
    require_once '../source/imagecolorallocatefromstring.php';
} elseif (!function_exists('imagecolorallocatefromstring')) {
    die('imagecolorallocatefromstring not found');
}

// Set the parameters for our image
$width           = 630;
$height          = 300;
$offset          = 25;
$squareWidth     = $offset * 2;
$squareHeight    = $height - ($offset * 2);

// Create our image and fill it with the background color
$im = imagecreatetruecolor($width, $height);

imagefill($im, 0, 0, imagecolorallocate($im, 0xEE, 0xEE, 0xEE));

// Fill our image with [identically] colored rectangles
foreach (
    array(
        imagecolorallocate($im, 0x00, 0xFF, 0x00),
        imagecolorallocatefromstring($im, '#00FF00'),
        imagecolorallocatefromstring($im, '#0f0'),
        imagecolorallocatefromstring($im, 'rgb(0 255 0)'),
        imagecolorallocatefromstring($im, 'rgb(0, 255, 0)'),
        imagecolorallocatefromstring($im, 'rgba(0, 255, 0, 1)'),
        imagecolorallocatefromstring($im, 'rgba(0 255 0 / 100%)'),
        imagecolorallocatefromstring($im, 'lime'),
    ) as $i => $green
) {
    imagefilledrectangle(
        $im,
        ($offset * ($i + 1)) + ($squareWidth * $i),
        $offset,
        ($offset + $squareWidth) * ($i + 1),
        $offset + $squareHeight,
        $green
    );
}

// Display our image and destroy the GD resource
header('Content-Type: image/png');
imagepng($im);
version_compare(PHP_VERSION, '8.0.0', '<') && imagedestroy($im);
