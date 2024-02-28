<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     *  @param int $id
     * @return Record|null
     */
    public static function findById($id)
    {
        return self::find($id);
    }


}
