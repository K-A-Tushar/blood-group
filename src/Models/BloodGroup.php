<?php

namespace Kawsar\BloodGroup\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodGroup extends Model
{
    protected $fillable = ['name', 'is_active'];

    protected static function boot()
    {
        parent::boot();

        $models = config('bloodgroup.models', []);

        foreach ($models as $key => $model) {
            static::macro($key . 's', function () use ($model): HasMany {
                return static::hasMany($model, 'blood_group_id');
            });
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', 0);
    }
}
