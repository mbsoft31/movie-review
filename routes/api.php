<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mbsoft\Models\Movie;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies/{slug}', function ($slug){
    $movie = Movie::findMovieBySlug($slug);
    return response()->json([
        'movie' => $movie,
        'summary' => 'Wonder Park tells the story of an amusement park where the imagination of a wildly creative girl named June comes alive.',
        'featured_img' => "http://www.fooshar.com/wp/wp-content/uploads/2016/06/wp-1.jpg",
        'directors' => $movie->directors,
        'producers' => $movie->producers,
        'stars' => $movie->stars,
        'writers' => $movie->writers,
    ]);
});

Route::post('/review/store', function (){
    return response()->json(
        \request()->all()
    );
});
