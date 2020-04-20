<?php


namespace Mbsoft\Models;


use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    public static function createPerson(string $name)
    {
        return static::create([
            'name' => $name
        ]);
    }
}
