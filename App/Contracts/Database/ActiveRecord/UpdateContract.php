<?php

declare(strict_types=1);

namespace App\Contracts\Database\ActiveRecord;

interface UpdateContract
{
    public function update(ActiveRecordContract $activeRecordInterface);
}