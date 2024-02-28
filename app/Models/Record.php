<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public static function findByData($criteria)
    {
        return self::where(function ($query) use ($criteria) {
            foreach ($criteria as $key => $value) {
                $query->whereJsonContains('data->'.$key, $value);
            }
        })->get();
    }
}
