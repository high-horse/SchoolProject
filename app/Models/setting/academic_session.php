<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academic_session extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active'];
}
