<?php

namespace App\Enums\Misc;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self eng()
 * @method static self rus()
 */
final class LanguageEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'eng' => 0,
            'rus' => 1,
        ];
    }

    protected static function labels(): array
    {
        return [
            'eng' => 'eng',
            'rus' => 'rus',
        ];
    }
}
