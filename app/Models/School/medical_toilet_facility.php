<?php

namespace App\Models\school;

use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class medical_toilet_facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_id',
        'first_aid_service',
        'transport_facility',
        'urinal_teacher',
        'nearest_distance',
        'urinal_boy',
        'no_of_toilet_boy',
        'no_of_toilet_girl',
        'no_of_toilet_teacher',
        'no_of_toilet_with_water_facility',
        'user_id'
    ];

    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }
}
