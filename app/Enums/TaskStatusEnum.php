<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case Done = 'done';
    case Processing = 'processing';

    public function label(): string
    {
        return match ($this) {
            static::Done => 'done',
            static::Processing => 'processing',
        };
    }
}
