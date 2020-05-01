<?php


namespace Mbsoft\Presenters;


use Carbon\Carbon;
use Mbsoft\Models\Movie;

class MoviePresenter
{
    /**
     * @var Movie
     */
    private $model;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    public function slug()
    {
        return $this->model->slug;
    }

    public function releasedAt()
    {
        return Carbon::make($this->model->release_date)->format('M d, Y');
    }

    public function trailer()
    {
        $media = $this->model->getMedia('trailer')->first();
        return (object)[
            'thumb' => $media,
            'url' => $media->getCustomProperty('url')
        ];
    }

    public function cover()
    {
        $media = $this->model->getMedia('cover')->first();
        return $media;
    }

    public function reviews(){
        return $this->model->reviews;
    }

    public function rating(){
        $reviews = $this->model->reviews;
        $total_reviews = $this->model->reviews()->count();
        $avg_rating = $this->model->reviews()->avg("rating");
        return [
            "reviews" => $reviews,
            "total_rating" => $total_reviews,
            "avg_rating" => $avg_rating
        ];
    }

    public function movieSingle(){
        return collect([
            'title' => $this->model->title,
            'summary' => $this->model->summary,
            'release_date' => $this->releasedAt(),
            'runtime' => $this->model->runtime,
            /*'stars' => $this->model->stars,
            'writers' => $this->model->writers,
            'producers' => $this->model->producers,
            'directors' => $this->model->directors,
            'categories' => $this->model->categories,*/
            'cover' => $this->cover(),
            'poster' => '',
            'trailer' => $this->trailer(),
            'videos' => [],
            'gallery' => [],
            'reviews' => $this->reviews(),
            'rating' => $this->rating()
        ]);
    }
}
