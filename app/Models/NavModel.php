<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/11/2018
 * Time: 7:10 PM
 */

namespace App\Models;

class NavModel
{
    public $name;
    public $route;
    private $table = "navigation";

    public function getAll()
    {
        return \DB::table($this->table)
            ->get();
    }
}