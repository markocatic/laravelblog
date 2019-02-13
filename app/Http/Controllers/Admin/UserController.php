<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/14/2018
 * Time: 11:29 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class UserController extends Controller
{
    public $data = [];

    public function index($id = null)
    {
        $user = new UserModel();
        $this->data['users'] = $user->selectAll();
        $role = new RoleModel();
        $this->data['roles'] = $role->selectAll();

        if(!empty($id)){
            $user->id = $id;
            $this->data['user'] = $user->selectOne($id);
        }

        return view("admin.pages.users", $this->data);
    }




    public function delete ($id)
    {
        $user = new UserModel();
        try
        {
            $user->delete($id);
            return redirect(route("users.index"))->with("success", "User deleted!");
        }
        catch(\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect(route("users.index"))->with("warning", "Server error.");
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|alpha|min:4|max:15',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:5',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/'
            ],
            'id_role' => 'required'
        ];


        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.',
            'id_role.required' => 'User role must be selected.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $user = new UserModel();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get("password");
        $user->username = $request->get("username");
        $user->id_role = $request->get("id_role");

        try {
            $user->update($id);
            return redirect(route("users.index"))->with("success", "User successfully updated!");
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Server error, try again later.");
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|alpha|min:4|max:15',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:5',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/'
            ],
            'id_role' => 'required'
        ];

        $messages = [
            'password.regex' => 'Password must contain one uppercase letter and one number.',
            'id_role.required' => 'User role must be selected.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();


    }

}