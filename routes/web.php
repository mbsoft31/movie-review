<?php

use Illuminate\Support\Facades\Route;
use Mbsoft\Models\Movie;

Route::get('/explore/movie/{slug}', function ($slug){
    $movie = Movie::findMovieBySlug($slug);
    if ($movie == null)
        abort(404);
    return view('content.movie.single', compact('movie'));
});

Route::get('/dashboard/movie/create', function (){
    return view('dashboard.movie.create');
});
