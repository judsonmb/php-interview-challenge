<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function cleanUpModels(array $models = []): void
    {
        if (count($models) < 1) {
            return;
        }

        foreach ($models as $model) {
            /** @var Model $model */
            $model->delete();
        }
    }
}
