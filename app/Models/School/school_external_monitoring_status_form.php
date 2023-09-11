<?php

namespace App\Models\School;

use App\Models\setting\academic_session;
use App\Models\setting\class_room;
use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class school_external_monitoring_status_form extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'teaching_method_id',
        'school_id',
        'academic_session_id',
        'child_club',
        'external_monitoring_status_id',
        'total',
        'user_id',
    ];

    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }

    public function academicSession(): BelongsTo
    {
        return $this->belongsTo(academic_session::class);
    }
}
