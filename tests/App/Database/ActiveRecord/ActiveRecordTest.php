<?php
use App\Database\ActiveRecord\ActiveRecord;

it('should return the table name when is not set', function () {
    $user = new TestingUser();
    $this->assertEquals('testing_user', $user->getTable());
});

class TestingUser extends ActiveRecord
{}