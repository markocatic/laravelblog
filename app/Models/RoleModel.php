<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/13/2018
 * Time: 11:12 PM
 */

namespace App\Models;


class RoleModel
{
    public $name;



    public function insert()
    {
        return \DB::table('roles')
            ->insertGetId([
                'name' => $this->name
            ]);
    }

    public function update($id)
    {
        return \DB::table('roles')
            ->update([
                'name' => $this->name
            ]);
    }

    public function selectAll()
    {
        return \DB::table("roles")->get();
    }

    public function selectOne($id)
    {
        return \DB::table('roles')
            ->where('id', $id)
            ->get()
            ->first();
    }

    public function delete($id)
    {
        return \DB::table("roles")
            ->delete($id);
    }


}