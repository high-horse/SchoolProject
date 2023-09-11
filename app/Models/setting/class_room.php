<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class class_room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class_rooms';

    protected $fillable = ['name'];
}
