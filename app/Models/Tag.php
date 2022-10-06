<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
   /* protected function namelug(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtolower(
                                    str_replace(' ', '-', $value)
                                )
        );
    }*/


    public function getSlugAttribute()
    {
        return strtolower(
            str_replace(' ', '-', $this->name)
        );
    }
}
