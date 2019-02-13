<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/12/2018
 * Time: 9:20 AM
 */

namespace App\Models;


class UserModel
{
    public $name;
    public $email;
    public $username;
    public $password;
    public $id_role;
    private $table = "users";

    public function insert()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => md5($this->password),
                'id_role' => $this->id_role
            ]);
    }

    public function login()
    {
        return \DB::table($this->table)
            ->join("roles", "users.id_role", "=", "roles.id")
            ->where([
                ["username", "=", $this->username],
                ["password", "=", md5($this->password)]
            ])->select("users.*", "roles.name as role")
            ->get()->first();
    }

    public function selectAll()
    {
        return \DB::table($this->table)
            ->join("roles", "id_role", "=", "roles.id")
            ->select("users.*", "roles.name as role")
            ->get();
    }

    public function selectOne($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)->first();
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => md5($this->password),
                'id_role' => $this->id_role
            ]);
    }
}