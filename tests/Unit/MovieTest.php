<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mbsoft\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    private $movie;

    public function test_create_movie()
    {
        /** @var Movie $movie */
        $movie = Movie::createMovie($this->movie->only([
            'title', 'release_date', 'runtime'
        ])->toArray());

        $this->assertEquals(Str::slug($this->movie['title']), $movie->getSlug());
    }

    public function test_create_movie_with_categories()
    {

        /** @var Movie $movie */
        $movie = Movie::createMovie($this->movie->only(['title', 'release_date', 'runtime'])->toArray())
            ->addManyCategories($this->movie->get('categories'));

        $categories = $movie->categories;

        self::assertInstanceOf(Collection::class, $categories);
        self::assertEquals(2, $categories->count());
        self::assertEquals(Arr::first($this->movie->get('categories')), $categories->first()->name);
    }

    public function test_can_find_movie_by_slug()
    {
        $createdMovie = Movie::createMovie($this->movie->only([
            'title', 'release_date', 'runtime'
        ])->toArray());

        $foundMovie = Movie::findMovieBySlug(Str::slug($this->movie->get('title')));

        self::assertEquals($foundMovie->id, $createdMovie->id);
        self::assertEquals($foundMovie->getSlug(), $createdMovie->getSlug());
    }

    public function test_movie_have_youtube_trailer()
    {

        $url = $this->movie->get('trailer_url');

        $movie = Movie::createMovie($this->movie->only([
            'title', 'release_date', 'runtime', 'trailer_url'
        ])->toArray());

        $trailer_url = $movie->getTrailer();

        self::assertEquals($url , $trailer_url);
    }

    public function test_add_director_to_movie()
    {
        /** @var Movie $movie */
        $movie = Movie::createMovie($this->movie->only([
            'title', 'release_date', 'runtime'
        ])->toArray());

        $directors = $this->movie['directors'];
        $added_directors = $movie->addDirectors($directors);

        self::assertCount(count($directors), $added_directors);
        self::assertInstanceOf(\Illuminate\Support\Collection::class, $added_directors);
        self::assertEquals('Dylan Brown', $added_directors->first()->name);
    }

    public function test_add_stars_to_movie()
    {
        /** @var Movie $movie */
        $movie = Movie::createMovie($this->movie->only([
            'title', 'release_date', 'runtime', 'trailer_url'
        ])->toArray());

        $stars = $this->movie['stars'];
        $added_stars = $movie->addStars($stars);

        self::assertCount(count($stars), $added_stars);
        self::assertInstanceOf(\Illuminate\Support\Collection::class, $added_stars);
        self::assertEquals('Sofia Mali', $added_stars->first()->name);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->movie = collect([
            'title' => 'Wonder Park',
            'release_date' => Carbon::parse('Mar 15, 2019'),
            'runtime' => '1h 25min',
            'trailer_url' => "https://youtu.be/VML6rQWssSk",
            'stars' => ['Sofia Mali', 'Jennifer Garner', 'Ken Hudson Campbell'],
            'writers' => ['Josh Appelbaum', 'Andre Nemec', 'Robert Gordon'],
            'producers' => ['Josh Appelbaum', 'Kendra Haaland', 'Andre Nemec'],
            'directors' => ['Dylan Brown', 'Josh Appelbaum'],
            'categories' => ['comedy', 'adventure']
        ]);
    }
}
