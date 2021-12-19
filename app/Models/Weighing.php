<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weighing extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "weighing";
    protected $primaryKey = "id";
    protected $guarded = [];
}
