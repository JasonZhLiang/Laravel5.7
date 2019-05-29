<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

/*Read this section of Laravel doc : http://laravel.com/docs/eloquent#mass-assignment, for the reason add protected property.
Laravel provides by default a protection against mass assignment security issues. That's why you have to manually define which fields could be "mass assigned" :
*/
    protected $fillable = ['body', 'completed'];

    //below method name must follow names defined in table, then laravel can find that property of this model

    public function getCompletedAttribute($value)
    {
        return (boolean) $value;
    }
}
