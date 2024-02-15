<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Str;

enum DocumentVerificationStatusEnums: string
{
    case APPROVED = "approved";
    case PENDING = "pending";
    case REJECTED = "rejected";
    case SPAM = "spam";

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $adminType) => [
                $adminType->value => Str::lower($adminType->name),
            ])->toArray();
    }
}
