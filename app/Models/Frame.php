<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string name
 * @property string description
 * @property int status
 * @property int stock
 * @property int created_at
 * @property int updated_at
 */
class Frame extends Model
{
    use HasFactory;
    const STATUS = [
      'ACTIVE'=>1,
      'INACTIVE'=>2
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function prices () : BelongsToMany
    {
        return $this->belongsToMany(Currency::class,'frame_currency')->withPivot('price');
    }

}
