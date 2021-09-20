<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->{$model->getUuidColumn()} = Str::uuid();
        });
    }

    public function getQualifiedUuidColumn()
    {
        return $this->getTable() . '.' . $this->getUuidColumn();
    }

    public function getUuidColumn()
    {
        return defined('static::UUID_COLUMN') ? static::UUID_COLUMN : 'uuid';
    }

    public function getRouteKeyName()
    {
        return $this->getUuidColumn();
    }
}
