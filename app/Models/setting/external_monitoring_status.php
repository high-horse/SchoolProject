<?php

namespace App\Models\setting;

use App\Models\School\school_external_monitoring_status_form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class external_monitoring_status extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description'];


    public function schoolEternalMonitoringStatusForm(): HasOne
    {
        return $this->hasOne(school_external_monitoring_status_form::class);
    }
}
