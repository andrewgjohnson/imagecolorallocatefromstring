<?php

/**
 * Imagecolorallocatefromstring v1.1.1
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

if (!function_exists('imagecolorallocatefromstring')) {
    /**
     * Imagecolorallocatefromstring is a function that will allocate a color based
     * on a string for your PHP GD images.
     *
     * Examples:
     *
     * ```
     * <?php
     * // Allocate red with imagecolorallocate() or with imagecolorallocatefromstring() via a string
     * $red           = imagecolorallocate($im, 0xFF, 0x00, 0x00);
     * $redFromString = imagecolorallocatefromstring($im, '#FF0000');
     * $redFromString = imagecolorallocatefromstring($im, '#f00');
     * $redFromString = imagecolorallocatefromstring($im, 'rgb(255 0 0)');
     * $redFromString = imagecolorallocatefromstring($im, 'rgb(255, 0, 0)');
     * $redFromString = imagecolorallocatefromstring($im, 'rgba(255, 0, 0, 1)');
     * $redFromString = imagecolorallocatefromstring($im, 'rgba(255 0 0 / 100%)');
     * $redFromString = imagecolorallocatefromstring($im, 'red');
     * ?>
     * ```
     *
     * @param \GdImage|resource $image  A GdImage object (PHP 8 and newer) or an image resource (older versions of PHP),
     * returned by one of the image creation functions, such as imagecreatetruecolor().
     * @param string            $string A string describing the color. You can pass a hex code (e.g. '#ff0000'), an RGB
     * value (e.g. 'rgb(255, 0, 0)') or an RGBA value (e.g. 'rgba(255, 0, 0, 1)').
     * @param int               $alpha  A value between 0 and 127. 0 indicates completely opaque while 127 indicates
     * completely transparent. Default is zero.
     *
     * @throws Exception if the $string parameter is invalid
     *
     * @return mixed Returns a color identifier or FALSE if the allocation failed.
     */
    function imagecolorallocatefromstring(
        $image,
        $string,
        $alpha = 0
    ) {
        // Convert the string to lowercase and remove surrounding whitespace.
        $string = strtolower(trim($string));

        // Track whether the caller explicitly used rgba().
        $isRgba = false;

        if (preg_match('/^#?([a-f0-9]{6}|[a-f0-9]{3})$/', $string)) { // Check if the string is a hex code.
            // Remove the pound/hashtag sign.
            $string = ltrim($string, '#');

            // If a short color code was passed convert it to a full color code.
            if (strlen($string) === 3) {
                $firstCharacter  = substr($string, 0, 1);
                $secondCharacter = substr($string, 1, 1);
                $thirdCharacter  = substr($string, 2, 1);

                $string  = str_repeat($firstCharacter, 2);
                $string .= str_repeat($secondCharacter, 2);
                $string .= str_repeat($thirdCharacter, 2);
            }

            // Transform the hex values to decimal values.
            $red   = hexdec(substr($string, 0, 2));
            $green = hexdec(substr($string, 2, 2));
            $blue  = hexdec(substr($string, 4, 2));
        } elseif (
            preg_match(
                '/^(rgba?)\(([0-9]+)(?:, *| +)([0-9]+)(?:, *| +)([0-9]+)(?:(?:, *| *\/ *)((?:0|1|0?\.[0-9]+)|' .
                '(?:[0-9]+(?:\.[0-9]+)?%)))?\)$/',
                $string,
                $matches
            )
        ) {
            // Track whether the caller explicitly passed an alpha value.
            $isRgba = isset($matches[5]) && $matches[5] !== '';

            // Transform the RGBA values to integers.
            $red   = (int)$matches[2];
            $green = (int)$matches[3];
            $blue  = (int)$matches[4];

            if ($isRgba) {
                // Extract the alpha value.
                $alphaValue = $matches[5];

                // If the alpha value is a percentage convert it to a decimal value.
                if (substr($alphaValue, -1) === '%') {
                    $alphaValue = ((float)substr($alphaValue, 0, -1)) / 100;
                } else {
                    $alphaValue = (float)$alphaValue;
                }

                // Validate the alpha value.
                if ($alphaValue < 0 || $alphaValue > 1) {
                    throw new Exception(
                        'imagecolorallocatefromstring function received an invalid value for $string, input was: ' .
                        $string
                    );
                }

                // Convert CSS opacity to GD alpha. CSS uses 1 as opaque and 0 as transparent while GD uses 0 as opaque
                // and 127 as transparent.
                $alpha = 127 - (int)round(127 * $alphaValue);
            }
        } else {
            // Match against CSS color keywords. Source: https://www.w3.org/wiki/CSS/Properties/color/keywords
            $cssColorKeywords = array(
                'aliceblue'            => array(0xF0, 0xF8, 0xFF),
                'antiquewhite'         => array(0xFA, 0xEB, 0xD7),
                'aqua'                 => array(0x00, 0xFF, 0xFF),
                'aquamarine'           => array(0x7F, 0xFF, 0xD4),
                'azure'                => array(0xF0, 0xFF, 0xFF),
                'beige'                => array(0xF5, 0xF5, 0xDC),
                'bisque'               => array(0xFF, 0xE4, 0xC4),
                'black'                => array(0x00, 0x00, 0x00),
                'blanchedalmond'       => array(0xFF, 0xEB, 0xCD),
                'blue'                 => array(0x00, 0x00, 0xFF),
                'blueviolet'           => array(0x8A, 0x2B, 0xE2),
                'brown'                => array(0xA5, 0x2A, 0x2A),
                'burlywood'            => array(0xDE, 0xB8, 0x87),
                'cadetblue'            => array(0x5F, 0x9E, 0xA0),
                'chartreuse'           => array(0x7F, 0xFF, 0x00),
                'chocolate'            => array(0xD2, 0x69, 0x1E),
                'coral'                => array(0xFF, 0x7F, 0x50),
                'cornflowerblue'       => array(0x64, 0x95, 0xED),
                'cornsilk'             => array(0xFF, 0xF8, 0xDC),
                'crimson'              => array(0xDC, 0x14, 0x3C),
                'cyan'                 => array(0x00, 0xFF, 0xFF),
                'darkblue'             => array(0x00, 0x00, 0x8B),
                'darkcyan'             => array(0x00, 0x8B, 0x8B),
                'darkgoldenrod'        => array(0xB8, 0x86, 0x0B),
                'darkgray'             => array(0xA9, 0xA9, 0xA9),
                'darkgreen'            => array(0x00, 0x64, 0x00),
                'darkgrey'             => array(0xA9, 0xA9, 0xA9),
                'darkkhaki'            => array(0xBD, 0xB7, 0x6B),
                'darkmagenta'          => array(0x8B, 0x00, 0x8B),
                'darkolivegreen'       => array(0x55, 0x6B, 0x2F),
                'darkorange'           => array(0xFF, 0x8C, 0x00),
                'darkorchid'           => array(0x99, 0x32, 0xCC),
                'darkred'              => array(0x8B, 0x00, 0x00),
                'darksalmon'           => array(0xE9, 0x96, 0x7A),
                'darkseagreen'         => array(0x8F, 0xBC, 0x8F),
                'darkslateblue'        => array(0x48, 0x3D, 0x8B),
                'darkslategray'        => array(0x2F, 0x4F, 0x4F),
                'darkslategrey'        => array(0x2F, 0x4F, 0x4F),
                'darkturquoise'        => array(0x00, 0xCE, 0xD1),
                'darkviolet'           => array(0x94, 0x00, 0xD3),
                'deeppink'             => array(0xFF, 0x14, 0x93),
                'deepskyblue'          => array(0x00, 0xBF, 0xFF),
                'dimgray'              => array(0x69, 0x69, 0x69),
                'dimgrey'              => array(0x69, 0x69, 0x69),
                'dodgerblue'           => array(0x1E, 0x90, 0xFF),
                'firebrick'            => array(0xB2, 0x22, 0x22),
                'floralwhite'          => array(0xFF, 0xFA, 0xF0),
                'forestgreen'          => array(0x22, 0x8B, 0x22),
                'fuchsia'              => array(0xFF, 0x00, 0xFF),
                'gainsboro'            => array(0xDC, 0xDC, 0xDC),
                'ghostwhite'           => array(0xF8, 0xF8, 0xFF),
                'gold'                 => array(0xFF, 0xD7, 0x00),
                'goldenrod'            => array(0xDA, 0xA5, 0x20),
                'gray'                 => array(0x80, 0x80, 0x80),
                'green'                => array(0x00, 0x80, 0x00),
                'greenyellow'          => array(0xAD, 0xFF, 0x2F),
                'grey'                 => array(0x80, 0x80, 0x80),
                'honeydew'             => array(0xF0, 0xFF, 0xF0),
                'hotpink'              => array(0xFF, 0x69, 0xB4),
                'indianred'            => array(0xCD, 0x5C, 0x5C),
                'indigo'               => array(0x4B, 0x00, 0x82),
                'ivory'                => array(0xFF, 0xFF, 0xF0),
                'khaki'                => array(0xF0, 0xE6, 0x8C),
                'lavender'             => array(0xE6, 0xE6, 0xFA),
                'lavenderblush'        => array(0xFF, 0xF0, 0xF5),
                'lawngreen'            => array(0x7C, 0xFC, 0x00),
                'lemonchiffon'         => array(0xFF, 0xFA, 0xCD),
                'lightblue'            => array(0xAD, 0xD8, 0xE6),
                'lightcoral'           => array(0xF0, 0x80, 0x80),
                'lightcyan'            => array(0xE0, 0xFF, 0xFF),
                'lightgoldenrodyellow' => array(0xFA, 0xFA, 0xD2),
                'lightgray'            => array(0xD3, 0xD3, 0xD3),
                'lightgreen'           => array(0x90, 0xEE, 0x90),
                'lightgrey'            => array(0xD3, 0xD3, 0xD3),
                'lightpink'            => array(0xFF, 0xB6, 0xC1),
                'lightsalmon'          => array(0xFF, 0xA0, 0x7A),
                'lightseagreen'        => array(0x20, 0xB2, 0xAA),
                'lightskyblue'         => array(0x87, 0xCE, 0xFA),
                'lightslategray'       => array(0x77, 0x88, 0x99),
                'lightslategrey'       => array(0x77, 0x88, 0x99),
                'lightsteelblue'       => array(0xB0, 0xC4, 0xDE),
                'lightyellow'          => array(0xFF, 0xFF, 0xE0),
                'lime'                 => array(0x00, 0xFF, 0x00),
                'limegreen'            => array(0x32, 0xCD, 0x32),
                'linen'                => array(0xFA, 0xF0, 0xE6),
                'magenta'              => array(0xFF, 0x00, 0xFF),
                'maroon'               => array(0x80, 0x00, 0x00),
                'mediumaquamarine'     => array(0x66, 0xCD, 0xAA),
                'mediumblue'           => array(0x00, 0x00, 0xCD),
                'mediumorchid'         => array(0xBA, 0x55, 0xD3),
                'mediumpurple'         => array(0x93, 0x70, 0xDB),
                'mediumseagreen'       => array(0x3C, 0xB3, 0x71),
                'mediumslateblue'      => array(0x7B, 0x68, 0xEE),
                'mediumspringgreen'    => array(0x00, 0xFA, 0x9A),
                'mediumturquoise'      => array(0x48, 0xD1, 0xCC),
                'mediumvioletred'      => array(0xC7, 0x15, 0x85),
                'midnightblue'         => array(0x19, 0x19, 0x70),
                'mintcream'            => array(0xF5, 0xFF, 0xFA),
                'mistyrose'            => array(0xFF, 0xE4, 0xE1),
                'moccasin'             => array(0xFF, 0xE4, 0xB5),
                'navajowhite'          => array(0xFF, 0xDE, 0xAD),
                'navy'                 => array(0x00, 0x00, 0x80),
                'oldlace'              => array(0xFD, 0xF5, 0xE6),
                'olive'                => array(0x80, 0x80, 0x00),
                'olivedrab'            => array(0x6B, 0x8E, 0x23),
                'orange'               => array(0xFF, 0xA5, 0x00),
                'orangered'            => array(0xFF, 0x45, 0x00),
                'orchid'               => array(0xDA, 0x70, 0xD6),
                'palegoldenrod'        => array(0xEE, 0xE8, 0xAA),
                'palegreen'            => array(0x98, 0xFB, 0x98),
                'paleturquoise'        => array(0xAF, 0xEE, 0xEE),
                'palevioletred'        => array(0xDB, 0x70, 0x93),
                'papayawhip'           => array(0xFF, 0xEF, 0xD5),
                'peachpuff'            => array(0xFF, 0xDA, 0xB9),
                'peru'                 => array(0xCD, 0x85, 0x3F),
                'pink'                 => array(0xFF, 0xC0, 0xCB),
                'plum'                 => array(0xDD, 0xA0, 0xDD),
                'powderblue'           => array(0xB0, 0xE0, 0xE6),
                'purple'               => array(0x80, 0x00, 0x80),
                'red'                  => array(0xFF, 0x00, 0x00),
                'rosybrown'            => array(0xBC, 0x8F, 0x8F),
                'royalblue'            => array(0x41, 0x69, 0xE1),
                'saddlebrown'          => array(0x8B, 0x45, 0x13),
                'salmon'               => array(0xFA, 0x80, 0x72),
                'sandybrown'           => array(0xF4, 0xA4, 0x60),
                'seagreen'             => array(0x2E, 0x8B, 0x57),
                'seashell'             => array(0xFF, 0xF5, 0xEE),
                'sienna'               => array(0xA0, 0x52, 0x2D),
                'silver'               => array(0xC0, 0xC0, 0xC0),
                'skyblue'              => array(0x87, 0xCE, 0xEB),
                'slateblue'            => array(0x6A, 0x5A, 0xCD),
                'slategray'            => array(0x70, 0x80, 0x90),
                'slategrey'            => array(0x70, 0x80, 0x90),
                'snow'                 => array(0xFF, 0xFA, 0xFA),
                'springgreen'          => array(0x00, 0xFF, 0x7F),
                'steelblue'            => array(0x46, 0x82, 0xB4),
                'tan'                  => array(0xD2, 0xB4, 0x8C),
                'teal'                 => array(0x00, 0x80, 0x80),
                'thistle'              => array(0xD8, 0xBF, 0xD8),
                'tomato'               => array(0xFF, 0x63, 0x47),
                'turquoise'            => array(0x40, 0xE0, 0xD0),
                'violet'               => array(0xEE, 0x82, 0xEE),
                'wheat'                => array(0xF5, 0xDE, 0xB3),
                'white'                => array(0xFF, 0xFF, 0xFF),
                'whitesmoke'           => array(0xF5, 0xF5, 0xF5),
                'yellow'               => array(0xFF, 0xFF, 0x00),
                'yellowgreen'          => array(0x9A, 0xCD, 0x32)
            );

            if (isset($cssColorKeywords[$string])) {
                $red   = $cssColorKeywords[$string][0];
                $green = $cssColorKeywords[$string][1];
                $blue  = $cssColorKeywords[$string][2];
            } else {
                // Throw an exception as the $string value passed was not a valid color.
                throw new Exception(
                    'imagecolorallocatefromstring function received an invalid value for $string, input was: ' . $string
                );
            }
        }

        // Validate the RGB values.
        if (
            $red < 0 ||
            $red > 255 ||
            $green < 0 ||
            $green > 255 ||
            $blue < 0 ||
            $blue > 255
        ) {
            // Throw an exception as the $string value passed was not a valid color.
            throw new Exception(
                'imagecolorallocatefromstring function received an invalid value for $string, input was: ' . $string
            );
        }

        // Validate the alpha value.
        if ($alpha < 0 || $alpha > 127) {
            // Throw an exception as the $alpha value passed was not valid.
            throw new Exception(
                'imagecolorallocatefromstring function received an invalid value for $alpha, input was: ' . $alpha
            );
        }

        // If rgba() was explicitly used or $alpha is greater than zero return an RGBA color identifier otherwise
        // return an RGB color identifier.
        if ($isRgba || $alpha > 0) {
            return imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
        } else {
            return imagecolorallocate($image, $red, $green, $blue);
        }
    }
}
