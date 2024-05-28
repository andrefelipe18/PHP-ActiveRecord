<?php

declare(strict_types=1);

namespace App\Contracts\Database\ActiveRecord;

interface ActiveRecordContract
{
    public function getTable(): string;

    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array;
    public function update(UpdateContract $updateInterface);

//    public function delete();
//    public function insert();
//    public function find();
//    public function all();
//    public function findBy();
}