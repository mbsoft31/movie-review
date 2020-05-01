<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mbsoft\Models\Person;

class UserController extends Controller
{

    public function fileUpload(){
        $user = Auth::user();
        $file = $user->addMediaFromRequest('file')->toMediaCollection('library');
        return $file->getFullUrl();
    }

    public function people() {
        return Person::select('name')->get();
    }

}
