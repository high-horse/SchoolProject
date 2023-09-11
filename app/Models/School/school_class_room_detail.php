<?php

namespace App\Models\School;

use App\Models\setting\academic_session;
use App\Models\setting\class_room;
use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class school_class_room_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_id',
        'class_room_id',
        'no_of_male',
        'no_of_female',
        'user_id',
        'academic_session_id'
    ];

    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }

    public function classRoom(): BelongsTo
    {
        return $this->belongsTo(class_room::class);
    }

    public function academicSession(): BelongsTo
    {
        return $this->belongsTo(academic_session::class);
    }
}
