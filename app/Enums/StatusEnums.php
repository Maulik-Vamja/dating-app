<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Str;

enum StatusEnums: int
{
    case INACTIVE = 0;
    case ACTIVE = 1;

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $status) => [
                $status->value => Str::lower($status->name),
            ])->toArray();
    }
}

// output of App\Enums\StatusEnums::options()
// [
//     0 => "inactive",
//     1 => "active"
// ]
