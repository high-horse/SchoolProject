<?php

namespace App\Models\School;

use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class physicalInformationForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'school_id',
        'school_location',
        'ropani',
        'aana',
        'paisa',
        'daam',
        'biggha',
        'kattha',
        'dhur',
        'total_no_of_computer',
        'computers_for_teaching',
        'computer_for_admin',
        'is_internet',
        'user_id',
    ];


    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }
}
