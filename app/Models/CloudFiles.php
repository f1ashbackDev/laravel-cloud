<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudFiles extends Model
{
    protected $fillable = [
        'name_file',
        'type',
        'url'
    ];
}
