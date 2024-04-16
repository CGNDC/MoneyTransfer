<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_user;

class tbl_user_type extends Model
{
    protected $fillable = [
        'id',
        'user_type',
    ];

    public function users()
    {
        return $this->hasMany(tbl_user::class, 'user_type_id');
    }
}
