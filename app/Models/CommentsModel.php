<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 15-Feb-18
 * Time: 22:54
 */

namespace App\Models;


class CommentsModel
{
    public $content;
    public $id_post;
    private $table = 'comments';

    public function save()
    {
        return \DB::table($this->table)
            ->insert([
                'id_user' => session()->get('user')->id,
                'id_post' => $this->id_post,
                'content' => $this->content,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }



    public function getPostComments($postId)
    {
        return \DB::table($this->table)
            ->join("users", "comments.id_user", "=", "users.id")
            ->where('id_post', $postId)
            ->select('comments.*', 'users.name')
            ->get();
    }


    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
                'content' => $this->content,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }


    public function getUserComments($userId)
    {
        return \DB::table($this->table)->where('id_user', $userId)->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)->get()->first();
    }


    public function delete($id)
    {
        if($this->canDelComment($id)) {
            return \DB::table($this->table)->delete($id);
        }
        return 0;
    }


    private function canDelComment($commentId)
    {
        $comment = $this->find($commentId);
        return $comment ? (session()->get('user')->role == 'admin') || ($comment->id_user == session()->get('user')->id) : false;
    }
}