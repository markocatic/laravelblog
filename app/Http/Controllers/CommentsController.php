<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postComment(Request $request, $postId)
    {
        if ($request->get("content")) {
            $commentsModel = new CommentsModel();
            $commentsModel->content = $request->get("content");
            $commentsModel->id_post = $postId;
            try {
                $commentsModel->save();
                return redirect()->back()->with('success', "You comment successfull.");
            } catch (QueryException $e) {
                \Log::error("Error on commenting " . $e->getMessage());
                return redirect()->back()->with('warning', "Server error. Please try later");
            }

        }
        return redirect()->back()->with('warning', "Message cant be empty.");
    }



    public function deleteComment($commentId)
    {
        $commentModel = new CommentsModel();
        if ($commentModel->find($commentId)) {
            try {
                if ($commentModel->delete($commentId)) {
                    return redirect()->back()->with("success", "Comment successfully deleted.");
                } else {
                    \Log::critical("User without permissions try to delete comment.");
                    return redirect()->back()->with("warning", "An error has occurred, please try again later.");
                }
            } catch (QueryException $e) {
                \Log::error("Error on deleting comment  " . $e->getMessage());
                return redirect()->back()->with("warning", "An error has occurred, please try again later.");
            }
        }
        return redirect()->back();
    }



    public function editComment(Request $request, $commentId)
    {
        $commentModel = new CommentsModel();
        try {
            $commentModel->content = $request->get('content');
            $commentModel->update($commentId);
            return response(null, 200);
        } catch (\Exception $e) {
            \Log::error("Error on editing" . $e->getMessage());
            return response(null, 422);
        }

    }

    public function show($commentId)
    {
        $commentModel = new CommentsModel();
        return response()->json($commentModel->find($commentId));
    }
}
