<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Str;

enum AdminTypeEnums: string
{
    case ADMIN = "admin";
    case MANAGER = "manager";
    case TECH_SUPPORT = "tech_support";

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $adminType) => [
                $adminType->value => Str::lower($adminType->name),
            ])->toArray();
    }
}

// output of App\Enums\AdminTypeEnums::options()
// [
//     "admin": "admin",
//     "manager": "manager",
//     "tech_support": "tech_support"
// ]
