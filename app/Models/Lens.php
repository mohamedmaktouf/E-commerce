<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string colour
 * @property string description
 * @property int prescription_type
 * @property int lens_type
 * @property int stock
 * @property int created_at
 * @property int updated_at
 */
class Lens extends Model
{
    use HasFactory;

    const PRESCRIPTION_TYPE = [
        'fashion' => 1,
        'single_version' => 2,
        'varifocal' => 3
    ];
    const LENS_TYPE = [
        'classic' => 1,
        'blue_light' => 2,
        'transition' => 3
    ];

    public function prices ()
    {
        return $this->belongsToMany(Currency::class,'lens_currency')->withPivot('price');
    }
}
