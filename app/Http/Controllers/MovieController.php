<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mbsoft\Models\Category;
use Mbsoft\Models\Movie;
use Mbsoft\Models\Review;

class MovieController extends Controller
{

    public function exploreMovie($slug){
        $movie = Movie::findMovieBySlug($slug);
        if ($movie == null)
            abort(404);
        return view('content.movie.single', compact('movie'));
    }

    public function createMovie(){
        return view('dashboard.movie.create');
    }

    public function storeMovie(Request $request){
        $data = collect(array_merge($request->all(),[]));

        $user = Auth::user();

        $movie = Movie::createMovie($data->only([
            'title', 'release_date', 'runtime','summary'
        ])->toArray());

        $user->movies()->attach($movie);
        $movie->addManyCategories($data['categories']);
        $movie->addDirectors($data['directors']);
        $movie->addProducers($data['producers']);
        $movie->addWriters($data['writers']);
        $movie->addStars($data['stars']);

        $movie->addMediaFromUrl($data['cover'])
            ->toMediaCollection("cover");

        $movie->addMediaFromUrl($data['poster'])
            ->toMediaCollection("poster");

        /*$movie->addMediaFromUrl($data['cover'])
            ->withCustomProperties(['url' => $data['trailer.url']])
            ->toMediaCollection("trailer");*/

        foreach ($data['gallery'] as $item) {
            $movie->addMediaFromUrl($item)
                ->toMediaCollection("gallery");
        }

        foreach ($data['videos'] as $item) {
            $movie->addMediaFromUrl($item['img'])
                ->withCustomProperties(['url' => $item['url']])
                ->toMediaCollection("videos");
        }

        return $movie;
    }

    public function createReview(){
        $user = Auth::user();
        $movie = Movie::findMovieBySlug(request()->movie);
        $review = Review::createReview($user, $movie, [
            "rating" => request()->rating,
            "review" => request()->review
        ]);
        return $review;
    }

    public function categories() {
        return Category::select(['name'])->get();
    }
}
