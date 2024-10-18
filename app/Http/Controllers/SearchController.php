<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($query)
    {
        return User::select('id', 'name', 'nick_name', 'profile_photo_path')
            ->where('nick_name', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%')
            ->get();
    }

}
