<?php

declare(strict_types=1);

namespace App\Contracts\Database\ActiveRecord;

interface ActiveRecordExecuteContract
{
    public function execute(ActiveRecordContract $activeRecordInterface): mixed;
}
