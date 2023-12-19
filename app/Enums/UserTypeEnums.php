<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Str;

enum UserTypeEnums: int
{
    case ADMIN = 0;
    case USER = 1;

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $userType) => [
                $userType->value => Str::lower($userType->name),
            ])->toArray();
    }
}

// output of App\Enums\UserTypeEnums::options()
// [
//     0 => "admin",
//     1 => "user"
// ]
