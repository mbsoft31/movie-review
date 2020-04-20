<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mbsoft\Models\Category;
use Mbsoft\Models\Movie;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $categories;
    /**
     * @var \Illuminate\Support\Collection
     */
    private $movies;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categories = collect([
            'comedy',
            'adventure'
        ]);
        $this->movies = collect([
            [
                'title' => 'Wonder Park',
                'release_date' => Carbon::parse('Mar 15, 2019'),
                'runtime' => '1h 25min',
            ],
            [
                'title' => 'Incredibles 2',
                'release_date' => Carbon::parse('July 13, 2018'),
                'runtime' => '1h 58min',
            ]
        ]);
    }

    public function test_create_category()
    {
        $categories = collect([]);

        $this->categories->each(function ($category) use($categories){
            $categories->add(Category::createCategory($category));
        });

        $this->assertInstanceOf(Category::class, $categories->first());
        $this->assertEquals($this->categories->first(), $categories->first()->name);
        self::assertCount(2 , $categories);
    }

    public function test_category_belongs_to_many_movies()
    {
        $movies = collect([]);

        $this->movies->each(function ($movie) use($movies){
            $movies->add(Movie::createMovie($movie));
        });

        /** @var Category $category */
        $category = Category::createCategory($this->categories->first());

        $category->addManyMovies($movies);

        $cat_movies = $category->movies;

        self::assertCount(2, $cat_movies);
    }

}
