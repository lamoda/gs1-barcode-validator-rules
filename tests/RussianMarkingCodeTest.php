<?php

declare(strict_types=1);

namespace Lamoda\GS1BarcodeValidatorRules\Tests;

use Lamoda\GS1BarcodeValidatorRules\RussianMarkingCode;
use Lamoda\GS1Parser\Parser\Parser;
use Lamoda\GS1Parser\Validator\Resolution;
use Lamoda\GS1Parser\Validator\Validator;
use PHPUnit\Framework\TestCase;

final class RussianMarkingCodeTest extends TestCase
{
    /**
     * @dataProvider dataConfig
     */
    public function testConfig(string $value, Resolution $expected): void
    {
        $parserConfig = RussianMarkingCode::parserConfig();
        $validatorConfig = RussianMarkingCode::validatorConfig();

        $parser = new Parser($parserConfig);
        $validator = new Validator($parser, $validatorConfig);

        $resolution = $validator->validate($value);

        $this->assertEquals($expected->isValid(), $resolution->isValid());
    }

    public function dataConfig(): array
    {
        return [
            'with tnved' => [
                "010467003301005321gJk6o54AQBJfX\u{001d}2406401\u{001d}91ffd0\u{001d}92LGYcm3FRQrRdNOO+8t0pz78QTyxxBmYKhLXaAS03jKV7oy+DWGy1SeU+BZ8o7B8+hs9LvPdNA7B6NPGjrCm34A==",
                Resolution::createValid(),
            ],
            'without tnved' => [
                "010467003301005321gJk6o54AQBJfX\u{001d}91ffd0\u{001d}92LGYcm3FRQrRdNOO+8t0pz78QTyxxBmYKhLXaAS03jKV7oy+DWGy1SeU+BZ8o7B8+hs9LvPdNA7B6NPGjrCm34A==",
                Resolution::createValid(),
            ],
            'without crypto part' => [
                '010467003301005321gJk6o54AQBJfX',
                Resolution::createInvalid([]),
            ],
            'without serial' => [
                "0104670033010053\u{001d}91ffd0\u{001d}92LGYcm3FRQrRdNOO+8t0pz78QTyxxBmYKhLXaAS03jKV7oy+DWGy1SeU+BZ8o7B8+hs9LvPdNA7B6NPGjrCm34A==",
                Resolution::createInvalid([]),
            ],
            'without gtin' => [
                "21gJk6o54AQBJfX\u{001d}91ffd0\u{001d}92LGYcm3FRQrRdNOO+8t0pz78QTyxxBmYKhLXaAS03jKV7oy+DWGy1SeU+BZ8o7B8+hs9LvPdNA7B6NPGjrCm34A==",
                Resolution::createInvalid([]),
            ],
        ];
    }
}