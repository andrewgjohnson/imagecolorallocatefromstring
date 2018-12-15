<?php

/**
 * Imagecolorallocatefromstring v1.0.1
 *
 * Copyright (c) 2018 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 * Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
 * AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imagecolorallocatefromstring
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagecolorallocatefromstring
 */

if (!function_exists('imagecolorallocatefromstring')) {
    /**
     * Imagecolorallocatefromstring is a function that will allocate a color based
     * on a string for your PHP GD images.
     *
     * @param resource $image  <p>An image resource, returned by one of the image
     *    creation functions, such as imagecreatetruecolor().</p>
     * @param int      $string <p>A string containing the color.</p>
     * @param int      $alpha  <p>A value between 0 and 127. 0 indicates completely
     *    opaque while 127 indicates completely transparent. Default is zero.</p>
     *
     * @throws InvalidArgumentException if the $string parameter is invalid
     *
     * @return mixed Returns a color identifier or FALSE if the allocation failed.
     */
    function imagecolorallocatefromstring(
        $image,
        $string,
        $alpha = 0
    ) {
        if (preg_match('/^#?([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $string)) {
            $string = trim($string);
            $string = ltrim($string, '#');

            if (strlen($string) === 3) {
                $firstCharacter = substr($string, 0, 1);
                $secondCharacter = substr($string, 1, 1);
                $thirdCharacter = substr($string, 2, 1);

                $string = $firstCharacter . $firstCharacter;
                $string .= $secondCharacter . $secondCharacter;
                $string .= $thirdCharacter . $thirdCharacter;
            }

            $red = hexdec(substr($string, 0, 2));
            $green = hexdec(substr($string, 2, 2));
            $blue = hexdec(substr($string, 4, 2));

            if ($alpha > 0) {
                return imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
            } else {
                return imagecolorallocate($image, $red, $green, $blue);
            }
        } else {
            $exceptionText = 'imagecolorallocatefromstring function received an ';
            $exceptionText .= 'invalid value for $string, input was: ' . $string;
            if (class_exists('InvalidArgumentException')) {
                throw new InvalidArgumentException($exceptionText);
            } else {
                throw new Exception($exceptionText);
            }
        }
    }
}
