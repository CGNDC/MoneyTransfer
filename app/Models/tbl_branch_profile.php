<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_branch_profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'branch_code',
        'country_iso_code',
    ];
}