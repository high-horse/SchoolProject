<?php

namespace App\Models\School;

use App\Http\Requests\School\PhysicalInformationForm;
use App\Models\setting\school;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class school_internet_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'school_id',
        'physical_information_form_id',
        'isp_id',
        'internet_speed',
        'isp_contact_no'
    ];

    public function School(): BelongsTo
    {
        return $this->belongsTo(school::class);
    }

    public function physicalInformationForm(): BelongsTo
    {
        return $this->belongsTo(physicalInformationForm::class);
    }

    public function Isp(): BelongsTo
    {
        return $this->belongsTo(Isp::class);
    }
}
