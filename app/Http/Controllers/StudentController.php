<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Posts;

class StudentController extends Controller
{
    public function index()
    {
        echo "Hello World";
    }

    public function insert()
    {
        DB::insert('insert into posts (title, content) values (?, ?)', ['PHP with Laravel', 'Laravel is the best thing that happen to PHP']);
    }

    public function read()
    {
        // $results = DB::select('select * from posts where id = ?', [1]);
        // return view("student.read", ['results' => $results]);
        $posts = Posts::all();
        $str = "";
        foreach ($posts as $post) {
            $str .= $post->title . "<br />";
        }

        return $str;
    }

    public function update()
    {
        // $updated = DB::update('update posts set title = ? where id = ?', ['Updated title', 1]);
        // return $updated;
        Posts::where('id', 5)->where('is_admin', false)->update([
            'title' => 'NEW PHP TITLE',
            'content' => 'I love learning Laravel'
        ]);
    }

    public function delete()
    {
        // $deleted = DB::delete('delete from posts where id = ?', [1]);
        // return $deleted;
        $post = Posts::find(5);
        $post->delete();
    }

    public function find($id)
    {
        $post = Posts::find($id);
        return $post->title;
    }

    public function findwhere()
    {
        $posts = Posts::where('is_admin', false)->orderBy('id', 'desc')->take(1)->get();
        return $posts;
    }

    public function basicinsert()
    {
        $post = new Posts();
        $post->title = "New Eloquent Title";
        $post->content = "Wow Eloquent Content is really cool";
        $post->is_admin = true;
        $post->save();
    }

    public function create()
    {
        Posts::create([
            'title' => 'Title with Create Method',
            'content' => 'Saya belajar banyak hari ini',
            'is_admin' => false
        ]);
    }

    public function basicupdate()
    {
        $post = Posts::find(5);
        $post->title = 'Updated Eloquent Title';
        $post->content = 'Updated Eloquent Content';
        $post->save();
    }

    public function softdelete()
    {
        Posts::find(6)->delete();
    }

    public function delete2()
    {
        Posts::destroy([2,3]);
    }

    public function readsoftdelete()
    {
        // $post = Posts::find(6);
        // return $post

        // $post = Posts::withTrashed()->where('id', 6)->get();
        // return $post;

        // $post = Posts::withTrashed()->get();
        // return $post;

        $post = Posts::onlyTrashed()->get();
        return $post;
    }

    public function restore()
    {
        Posts::withTrashed()->where('id', 6)->restore();
    }

    public function forcedelete()
    {
        Posts::onlyTrashed()->where('is_admin', 0)->forceDelete();
    }
}
