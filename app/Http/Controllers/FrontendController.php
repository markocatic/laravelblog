<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/7/2018
 * Time: 6:28 PM
 */

namespace App\Http\Controllers;


use App\Models\CommentsModel;
use App\Models\NavModel;
use App\Models\PostModel;
use Illuminate\Support\Facades\Request;

class FrontendController
{
    private $data;
    public function __construct()
    {
        $navModel = new NavModel();
        $this->data['nav'] = $navModel->getAll();
    }

    function index(){
        $postModel = new PostModel();
        $this->data['posts'] = $postModel->all();
        return view('pages.home',$this->data);
    }

    public function single(Request $request, $id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);
        if (!$post) {
            abort(404);
        }

        $commentsModel = new CommentsModel();
        $post->comments = $commentsModel->getPostComments($id);
        $this->data['post'] = $post;
        return view("pages.post", $this->data);
    }




    function contact(){
        return view('pages.contact',$this->data);
    }
    function showLogin(){
        return view('pages.login',$this->data);
    }
    function showRegister(){
        return view('pages.register',$this->data);
    }
}