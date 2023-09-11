<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class class_school extends Model
{
    use HasFactory;

    protected $fillable = ['class_room_id', 'school_id', 'academic_session_id'];
    
    protected $table = 'class_room_school';

    public function academicSession(): BelongsTo
    {
        return $this->belongsTo(academic_session::class);
    }
}
