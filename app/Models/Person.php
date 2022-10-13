<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'id',
        'name',
        'surname',
        'sex',
        'birth_date',
    ];

    protected $appends = [
        'age'
    ];

    /**
     * @return int
     */
    public function getAgeAttribute(): int
    {
        return Carbon::parse($this['birth_date'])->diffInDays();
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        return false;
    }
}
