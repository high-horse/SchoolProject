<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class school extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'schools';

    protected $fillable = [
        'name',
        'address',
        'p_name',
        'c_name',
        'contact_no',
        'latitude',
        'longitude',
        'user_id'
    ];

    public function Classes(): BelongsToMany
    {
        return $this->belongsToMany(class_room::class);
    }

    // over riding orm to insert user id by default
    protected static function booted()
    {
        static::creating(function ($product) {
            $product->user_id = auth()->id();
        });
    }
}
