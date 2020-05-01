<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/explore/movie/{slug}', 'MovieController@exploreMovie')->name('movie.explore');

Route::get('/dashboard/movie/create', 'MovieController@createMovie')->name('movie.create');

Route::post('/dashboard/movie/store', 'MovieController@storeMovie')->name('movie.store');

Route::post('/review/store', 'MovieController@createReview')->name('review.create');

Route::get('/dashboard/movie/slug', function () {
    $title = request('title');
    $slug = Illuminate\Support\Str::slug($title);
    $movie = Mbsoft\Models\Movie::findMovieBySlug($slug);
    if ($movie != null) {
        $i = 1;
        do {
            $newSlug = $slug . '-' . $i;
            $movie = Mbsoft\Models\Movie::findMovieBySlug($newSlug);
            $i = $i + 1;
        } while ($movie != null);
        $slug = $newSlug;
    }
    dd($slug);
    return $slug;
});

Route::post('/fileupload', 'UserController@fileUpload');

Route::post('/people', 'UserController@people');

Route::post('/categories/json', 'MovieController@categories');

Auth::routes();
