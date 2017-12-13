<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandAdmin extends Model
{
    protected $table='brandadmins';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
