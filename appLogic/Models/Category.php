<?php


namespace Mbsoft\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * @param string $name
     * @return Category
     */
    public static function createCategory(string $name)
    {
        $category = Category::where('name', $name)->first();
        if ($category != null)
            return $category;
        return static::create(['name' => $name]);
    }

    public function addManyMovies(\Illuminate\Support\Collection $movies)
    {
        foreach ($movies as $movie) {
            self::movies()->attach($movie);
        }
    }

    public function movies()
    {
        return self::belongsToMany(Movie::class);
    }

}
