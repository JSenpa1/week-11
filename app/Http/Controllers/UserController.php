<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Posts;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function posts($id)
    {
        $user = User::find($id);

        foreach($user->posts as $post)
        {
            echo $post->title . "<br />";
        }
    }

    public function user($id)
    {
        return Posts::find($id)->user->name;
    }
}
