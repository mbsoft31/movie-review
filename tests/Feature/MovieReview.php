<?php

namespace Tests\Feature;

use App\User;
use Mbsoft\Models\Movie;
use Mbsoft\Models\Review;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieReview extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_add_review()
    {
        $user = factory(User::class)->create([
            "username" => "mbsoft"
        ]);

        $movie = Movie::createMovie($this->movie->first()->only([
            'title', 'release_date', 'runtime', 'summary'
        ])->toArray());

        $review = Review::createReview($user, $movie, [
            "rating" => 5.9,
            "review" => "bla bla bla"
        ]);

        self::assertInstanceOf(Review::class, $review);
        self::assertEquals(5.9, $review->getRating());
        self::assertEquals($user->getUsername(), $review->getUser()->getUsername());
    }

    public function test_movie_is_reviewed_by_a_user(){
        $user = factory(User::class)->create([
            "username" => "mbsoft"
        ]);

        $movie = Movie::createMovie($this->movie->first()->only([
            'title', 'release_date', 'runtime', 'summary'
        ])->toArray());

        $review = Review::createReview($user, $movie, [
            "rating" => 5.9,
            "review" => "bla bla bla"
        ]);

        self::assertTrue($movie->isReviewedBy($user));
    }

    public function test_movie_is_reviewed_by_a_wrong_user(){
        $mbsoft = factory(User::class)->create([
            "username" => "mbsoft"
        ]);
        $nassim = factory(User::class)->create([
            "username" => "nassim"
        ]);

        $movie = Movie::createMovie($this->movie->first()->only([
            'title', 'release_date', 'runtime', 'summary'
        ])->toArray());

        $review = Review::createReview($nassim, $movie, [
            "rating" => 5.9,
            "review" => "bla bla bla"
        ]);

        self::assertFalse($movie->isReviewedBy($mbsoft));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->movie = collect([
            collect([
                'title' => 'Wonder Park',
                'summary' => 'Wonder Park tells the story of an amusement park where the imagination of a wildly creative girl named June comes alive.',
                'release_date' => Carbon::parse('Mar 15, 2019'),
                'runtime' => '1h 25min',
                'stars' => ['Sofia Mali', 'Jennifer Garner', 'Ken Hudson Campbell'],
                'writers' => ['Josh Appelbaum', 'Andre Nemec', 'Robert Gordon'],
                'producers' => ['Josh Appelbaum', 'Kendra Haaland', 'Andre Nemec'],
                'directors' => ['Dylan Brown'],
                'categories' => ['comedy', 'adventure'],
                'cover' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-1.jpg',
                'poster' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-cover.jpg',
                'trailer' => "https://youtu.be/VML6rQWssSk",
                'videos' => [
                    [
                        'url' => 'https://youtu.be/VML6rQWssSk',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-2.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/5MRSBuQt51A',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-4.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/vYm7mYd0SgE',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-1.jpg',
                    ],
                ],
                'gallery' => [
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-2.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-4.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-1.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/wp-3.jpg',
                ]
            ]),
            collect([
                'title' => 'How to Train Your Dragon',
                'summary' => 'When Hiccup discovers Toothless isn\'t the only Night Fury, he must seek "The Hidden World", a secret Dragon Utopia before a hired tyrant named Grimmel finds it first.',
                'release_date' => Carbon::parse('Feb 22, 2019'),
                'runtime' => '1h 44min',
                'stars' => ['Jay Baruchel', 'America Ferrera', 'F. Murray Abraham'],
                'writers' => ['Dean DeBlois', 'Cressida Cowell'],
                'producers' => ['Bonnie Arnold', 'Bradford Lewis'],
                'directors' => ['Dean DeBlois'],
                'categories' => ['action', 'adventure'],
                'cover' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-1.jpg',
                'poster' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/dragon-cover.jpg',
                'trailer' => "https://youtu.be/SkcucKDrbOI",
                'videos' => [
                    [
                        'url' => 'https://youtu.be/SkcucKDrbOI',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-1.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/qLTDtbYmdWM',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-4.jpg',
                    ],
                ],
                'gallery' => [
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-1.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-4.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-3.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-2.jpg'
                ]
            ]),
            collect([
                'title' => 'The Angry Birds Movie 2',
                'summary' => 'Red, Chuck, Bomb and the rest of their feathered friends are surprised when a green pig suggests that they put aside their differences and unite to fight a common threat. Aggressive birds from an island covered in ice are planning to use an elaborate weapon to destroy the fowl and swine way of life. After picking their best and brightest, the birds and pigs come up with a scheme to infiltrate the island, deactivate the device and return to their respective paradises intact.',
                'release_date' => Carbon::parse('Aug 2, 2019'),
                'runtime' => '1h 36min',
                'stars' => ['Jason Sudeikis', 'Josh Gad', 'Leslie Jones'],
                'writers' => ['Peter Ackerman', 'Eyal Podell', 'Jonathon E. Stewart'],
                'producers' => ['John Cohen'],
                'directors' => ['Thurop Van Orman'],
                'categories' => ['animation', 'comedy'],
                'cover' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-4.jpg',
                'poster' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-cover.jpg',
                'trailer' => "https://youtu.be/RSKQ-lVsMdg",
                'videos' => [
                    [
                        'url' => 'https://youtu.be/RSKQ-lVsMdg',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-4.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/egDqXpwKwnk',
                        'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-3.jpg',
                    ],
                ],
                'gallery' => [
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-4.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-3.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-2.jpg',
                    'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/ab-1.jpg',
                ]
            ])
        ]);
    }
}
