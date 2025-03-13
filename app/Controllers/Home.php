<?php

namespace App\Controllers;

use Throwable;

class Home extends BaseController
{
    public function index()
    {
        // echo("Hola CI4");

        // $migrate = \Config\Services::migrations();

        // try {
        //     $migrate->latest();
        //     // $migrate->regress(-1);
        // } catch(Throwable $e){
        //     echo $e;
        // }

        $seeder =\Config\Database::seeder();
        $seeder->call('CategoriasSeeder');
    }
}
