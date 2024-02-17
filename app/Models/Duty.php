<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Duty extends Model
{
    use HasFactory;

    protected function name(): Attribute
    {
        return Attribute::make(
            set: function($value){
                return trim($value);
            }
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            set: function($value){
                return trim($value);
            }
        );
    }

}
