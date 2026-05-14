<?php

/**
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
 */

namespace AndrewGJohnson\AgjGd\Tests;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ImagecolorallocatefromstringTest extends TestCase
{
    private \GdImage $image;

    protected function setUp(): void
    {
        $this->image = imagecreatetruecolor(100, 100);
    }

    public function testFunctionExists(): void
    {
        $this->assertTrue(function_exists('imagecolorallocatefromstring'));
    }

    public function testHexSixDigitUppercase(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, '#FF0000')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testHexSixDigitLowercase(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, '#ff0000')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testHexSixDigitWithoutHash(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'ff0000')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testHexThreeDigit(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, '#f00')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testRgbWithCommas(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgb(0, 255, 0)')
        );

        $this->assertSame(0, $components['red']);
        $this->assertSame(255, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testRgbWithSpaces(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgb(0 255 0)')
        );

        $this->assertSame(0, $components['red']);
        $this->assertSame(255, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']);
    }

    public function testRgbaOpaqueDecimalAlpha(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgba(0, 0, 255, 1)')
        );

        $this->assertSame(0, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(255, $components['blue']);
        $this->assertSame(0, $components['alpha']); // CSS alpha 1 (opaque) → GD alpha 0
    }

    public function testRgbaTransparentDecimalAlpha(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgba(0, 0, 255, 0)')
        );

        $this->assertSame(127, $components['alpha']); // CSS alpha 0 (transparent) → GD alpha 127
    }

    public function testRgbaHalfTransparentDecimalAlpha(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgba(0, 0, 255, 0.5)')
        );

        $this->assertSame(63, $components['alpha']); // 127 - round(127 * 0.5) = 127 - 64 = 63
    }

    public function testRgbaOpaquePercentageAlpha(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgba(0 255 0 / 100%)')
        );

        $this->assertSame(0, $components['red']);
        $this->assertSame(255, $components['green']);
        $this->assertSame(0, $components['blue']);
        $this->assertSame(0, $components['alpha']); // CSS alpha 100% (opaque) → GD alpha 0
    }

    public function testRgbaTransparentPercentageAlpha(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'rgba(0 255 0 / 0%)')
        );

        $this->assertSame(127, $components['alpha']); // CSS alpha 0% (transparent) → GD alpha 127
    }

    public static function cssKeywordProvider(): array
    {
        return [
            'red'   => ['red',   255, 0,   0  ],
            'green' => ['green', 0,   128, 0  ],
            'blue'  => ['blue',  0,   0,   255],
            'white' => ['white', 255, 255, 255],
            'black' => ['black', 0,   0,   0  ],
            'lime'  => ['lime',  0,   255, 0  ],
        ];
    }

    #[DataProvider('cssKeywordProvider')]
    public function testCssColorKeyword(string $keyword, int $red, int $green, int $blue): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, $keyword)
        );

        $this->assertSame($red, $components['red']);
        $this->assertSame($green, $components['green']);
        $this->assertSame($blue, $components['blue']);
    }

    public function testCssKeywordCaseInsensitive(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, 'RED')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
    }

    public function testAlphaParameter(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, '#0000ff', 64)
        );

        $this->assertSame(0, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(255, $components['blue']);
        $this->assertSame(64, $components['alpha']);
    }

    public function testLeadingAndTrailingWhitespaceTrimmed(): void
    {
        $components = imagecolorsforindex(
            $this->image,
            imagecolorallocatefromstring($this->image, '  #FF0000  ')
        );

        $this->assertSame(255, $components['red']);
        $this->assertSame(0, $components['green']);
        $this->assertSame(0, $components['blue']);
    }

    public function testInvalidStringThrowsException(): void
    {
        $this->expectException(Exception::class);

        imagecolorallocatefromstring($this->image, 'notacolor');
    }

    public function testOutOfRangeRgbThrowsException(): void
    {
        $this->expectException(Exception::class);

        imagecolorallocatefromstring($this->image, 'rgb(999, 0, 0)');
    }

    public function testInvalidAlphaParameterThrowsException(): void
    {
        $this->expectException(Exception::class);

        imagecolorallocatefromstring($this->image, '#ff0000', 128);
    }

    public function testInvalidRgbaAlphaValueThrowsException(): void
    {
        $this->expectException(Exception::class);

        imagecolorallocatefromstring($this->image, 'rgba(255, 0, 0, 1.5)');
    }
}
