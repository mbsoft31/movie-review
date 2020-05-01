<?php


namespace Mbsoft\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public static function createReview($user, $movie, $data){
        $user->reviews()->save($movie, $data);
        return $movie->getReview($user);
    }

    public function getRating(){
        return $this->rating;
    }

    public function getUser(){
        return User::find($this->user_id);
    }
}
