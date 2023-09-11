<?php

namespace App\Models\School;

use App\Models\setting\extra_class_room;
use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class school_class_room_extra_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['extra_class_room_id', 'total', 'school_id'];

    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }

    public function extraClassRoom(): BelongsTo
    {
        return $this->belongsTo(extra_class_room::class);
    }
}
