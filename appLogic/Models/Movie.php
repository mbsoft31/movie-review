<?php


namespace Mbsoft\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Movie extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];

    /**
     * @param $data
     * @return Movie
     */
    public static function createMovie($data)
    {
        $slug = Str::slug($data['title']);
        $data['slug'] = $slug;

        return self::create($data);
    }

    /**
     * @param string $slug
     * @return Movie
     */
    public static function findMovieBySlug(string $slug)
    {
        return static::where('slug', $slug)->first();
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getReleased()
    {
        if (Carbon::make($this->release_date) == null)
            return "";
        return Carbon::make($this->release_date)->format('M d, Y');
    }

    public function getTrailer()
    {
        return '';
    }

    public function getReview($user){
        return Review::where("user_id", $user->id)->where("movie_id", $this->id)->first();
    }

    public function getRating(){
        $reviews = $this->reviews;
        $total_reviews = $this->reviews()->count();
        $avg_rating = $this->reviews()->avg("rating");
        return [
            "reviews" => $reviews,
            "total_rating" => $total_reviews ?? 0,
            "avg_rating" => $avg_rating ?? 0
        ];
    }

    public function isReviewedBy($user){
        return Review::where("user_id", $user->id)->where("movie_id", $this->id)->first() != null;
    }

    /**
     * @param array $categories
     * @return Movie
     */
    public function addManyCategories($categories)
    {
        foreach ($categories as $cat) {
            $this->addCategory($cat);
        }
        return $this;
    }

    /**
     * @param string $name
     * @return Movie
     */
    public function addCategory(string $name)
    {
        $this->categories()->attach(Category::createCategory($name));
        return $this;
    }

    /**
     * @param array $directors
     * @return Collection
     */
    public function addDirectors(array $directors)
    {
        foreach ($directors as $director) {
            $this->addDirector($director);
        }

        return $this->directors;
    }

    private function addDirector(string $director)
    {
        $person = Person::createPerson($director);
        $this->directors()->attach($person, ["role" => "director"]);
    }

    /**
     * @param array $stars
     * @return Collection
     */
    public function addStars(array $stars)
    {
        foreach ($stars as $star) {
            $this->addStar($star);
        }

        return $this->stars;
    }

    /**
     * @param string $star
     */
    private function addStar(string $star)
    {
        /** @var Person $person */
        $person = Person::createPerson($star);
        $this->stars()->attach($person, ["role" => "star"]);
    }

    /**
     * @param array $writers
     * @return Collection
     */
    public function addWriters(array $writers)
    {
        foreach ($writers as $writer) {
            $this->addWriter($writer);
        }

        return $this->writers;
    }

    /**
     * @param string $writer
     */
    private function addWriter(string $writer)
    {
        $person = Person::createPerson($writer);
        $this->writers()->attach($person, ["role" => "writer"]);
    }

    /**
     * @param array $producers
     * @return Collection
     */
    public function addProducers(array $producers)
    {
        foreach ($producers as $producer) {
            $this->addProducer($producer);
        }

        return $this->producers;
    }

    /**
     * @param string $producer
     */
    private function addProducer(string $producer)
    {
        $person = Person::createPerson($producer);
        $this->producers()->attach($person, ["role" => "producer"]);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withTimestamps();
    }

    public function directors()
    {
        return $this->belongsToMany(Person::class)
            ->wherePivot("role", "director")
            ->withTimestamps();
    }

    public function writers()
    {
        return $this->belongsToMany(Person::class)
            ->wherePivot("role", "writer")
            ->withTimestamps();
    }

    public function stars()
    {
        return $this->belongsToMany(Person::class)
            ->wherePivot("role", "star")
            ->withTimestamps();
    }

    public function producers()
    {
        return $this->belongsToMany(Person::class)
            ->wherePivot("role", "producer")
            ->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('trailer')
            ->singleFile();
            //->withResponsiveImages();
        $this->addMediaCollection('cover')
            ->singleFile();
            //->withResponsiveImages();
        $this->addMediaCollection('poster')
            ->singleFile();
            //->withResponsiveImages();

        $this->addMediaCollection('gallery');
            //->withResponsiveImages();
        $this->addMediaCollection('videos');
    }

    public function reviews(){
        return $this->belongsToMany(User::class, 'reviews')->withPivot(['review','rating']);
    }

}
