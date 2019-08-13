<?php

declare(strict_types=1);

namespace Lamoda\GS1BarcodeValidatorRules;

use Lamoda\GS1Parser\Constants;
use Lamoda\GS1Parser\Parser\ParserConfig;
use Lamoda\GS1Parser\Validator\ValidatorConfig;

final class RussianMarkingCode
{
    public const AI_GTIN = '01';
    public const AI_SERIAL = '21';
    public const AI_TNVED = '240';
    public const AI_VALIDATION = '91';
    public const AI_CRYPTO = '92';

    public static function parserConfig(): ParserConfig
    {
        return (new ParserConfig())
            ->setGroupSeparator(Constants::GROUP_SEPARATOR_SYMBOL)
            ->setFnc1SequenceRequired(false)
            ->setKnownAIs([
                self::AI_GTIN,
                self::AI_SERIAL,
                self::AI_TNVED,
                self::AI_CRYPTO,
                self::AI_VALIDATION,
            ]);
    }

    public static function validatorConfig(): ValidatorConfig
    {
        return (new ValidatorConfig())
            ->setAllowEmpty(false)
            ->setRequiredAIs([
                self::AI_GTIN,
                self::AI_SERIAL,
                self::AI_CRYPTO,
                self::AI_VALIDATION,
            ]);
    }
}