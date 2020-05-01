<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Mbsoft\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dd(Storage::directories('/public'));
        $dirs = Storage::directories('/public');
        foreach ($dirs as $folder) {
            Storage::deleteDirectory($folder);
        }
        //dd(Storage::directories('/public'));
        $user = \App\User::create([
            'username' => "mbsoft",
            'email' => "bekhouche.mouadh@gmail.com",
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('mbsoft'), // password
        ]);

        $data = collect([
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
                'cover' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-1.jpg',
                'poster' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-cover.jpg',
                'trailer' => [
                    'url' => 'https://youtu.be/VML6rQWssSk',
                    'img' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-1.jpg'
                ],
                'videos' => [
                    [
                        'url' => 'https://youtu.be/VML6rQWssSk',
                        'img' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-1.jpg'
                    ],
                    [
                        'url' => 'https://youtu.be/5MRSBuQt51A',
                        'img' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-2.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/vYm7mYd0SgE',
                        'img' => 'C:\wamp64\www\movie-review\public\images\wonder-park\wp-3.jpg',
                    ],
                ],
                'gallery' => [
                    'C:\wamp64\www\movie-review\public\images\wonder-park\wp-2.jpg',
                    'C:\wamp64\www\movie-review\public\images\wonder-park\wp-4.jpg',
                    'C:\wamp64\www\movie-review\public\images\wonder-park\wp-1.jpg',
                    'C:\wamp64\www\movie-review\public\images\wonder-park\wp-3.jpg',
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
                'trailer' => [
                    'url' => 'https://youtu.be/SkcucKDrbOI',
                    'img' => 'http://demo.themexpert.com/wordpress/gamez/movie-review/wp-content/uploads/sites/10/2016/06/d-1.jpg',
                ],
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
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-1.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-4.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-3.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-2.jpg'
                ]
            ]),
            collect([
                'title' => 'The Angry Birds Movie 2',
                'summary' => 'Red, Chuck, Bomb and the rest of their feathered friends are surprised when a green pig suggests that they put aside their differences and unite to fight a common threat. Aggressive birds from an island covered in ice are planning to use an elaborate weapon to destroy the fowl and swine way of life. After picking their best and brightest, the birds and pigs come up with a scheme to infiltrate the island, deactivate the device and return to their respective paradises intact.',
                'release_date' => Carbon::parse('Aug 2, 2019'),
                'runtime' => '1h 36min',
                'stars' => ['Peter Ackerman', 'Eyal Podell', 'Jonathon E. Stewart'],//['Jason Sudeikis', 'Josh Gad', 'Leslie Jones'],
                'writers' => ['Peter Ackerman', 'Eyal Podell', 'Jonathon E. Stewart'],
                'producers' => ['John Cohen'],
                'directors' => ['Thurop Van Orman'],
                'categories' => ['animation', 'comedy'],
                'cover' => 'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-4.jpg',
                'poster' => 'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\dragon-cover.jpg',
                'trailer' => [
                    'url' => 'https://youtu.be/RSKQ-lVsMdg',
                    'img' => 'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-4.jpg',
                ],
                'videos' => [
                    [
                        'url' => 'https://youtu.be/RSKQ-lVsMdg',
                        'img' => 'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-4.jpg',
                    ],
                    [
                        'url' => 'https://youtu.be/egDqXpwKwnk',
                        'img' => 'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-3.jpg',
                    ],
                ],
                'gallery' => [
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-4.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-3.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-2.jpg',
                    'C:\wamp64\www\movie-review\public\images\how-to-train-your-dragon\d-1.jpg',
                ]
            ]),
        ]);

        foreach ($data as $single) {
            $movie = Movie::createMovie($single->only([
                'title', 'release_date', 'runtime', 'summary'
            ])->toArray());

            $user->movies()->attach($movie);

            // Movie casts
            $movie->addManyCategories($single['categories']);
            $movie->addDirectors($single['directors']);
            $movie->addProducers($single['producers']);
            $movie->addWriters($single['writers']);
            $movie->addStars($single['stars']);

            // Movie Medias
            $movie->addMediaFromUrl($single['cover'])
                ->toMediaCollection("cover");
            $movie->addMediaFromUrl($single['poster'])
                ->toMediaCollection("poster");
            $movie->addMediaFromUrl($single['trailer']['img'])
                ->withCustomProperties(['url' => $single['trailer']['url']])
                ->toMediaCollection("trailer");
            foreach ($single['gallery'] as $item) {
                $movie->addMediaFromUrl($item)
                    ->toMediaCollection("gallery");
            }
            foreach ($single['videos'] as $item) {
                $movie->addMediaFromUrl($item['img'])
                    ->withCustomProperties(['url' => $item['url']])
                    ->toMediaCollection("videos");
            }
        }
    }
}
