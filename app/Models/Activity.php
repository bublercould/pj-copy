<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = "activity";

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

}
