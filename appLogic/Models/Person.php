<?php


namespace Mbsoft\Models;


use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    public static function createPerson(string $name)
    {
        $person = static::where('name', $name)->first();
        if ($person != null)
            return $person;
        return static::create([
            'name' => $name
        ]);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withPivot(["role"]);
    }
}
