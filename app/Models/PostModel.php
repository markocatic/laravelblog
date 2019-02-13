<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/12/2018
 * Time: 6:37 PM
 */

namespace App\Models;


class PostModel
{
    public $title;
    public $content;
    public $description;
    public $id_picture;
    public $id_user;
    private $table = "posts";

    public function all()
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.id_picture', '=', 'pictures.id')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->select('posts.*', 'pictures.path', 'pictures.alt', 'users.name')
            ->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.id_picture', '=', 'pictures.id')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->where('posts.id', $id)
            ->select('posts.*', 'pictures.path', 'pictures.alt', 'users.name')
            ->get()->first();
    }
}