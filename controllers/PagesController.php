<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home(){

        $persons = App::get('builder')->selectAll('people');

        require 'views/index.view.php';
    }


    public function about(){

        require 'views/about.view.php';
    }



    public function contact(){

        require'views/contact.view.php';
    }


    public function addform(){

        require 'views/create.view.php';

    }


    public function add(){

        $firstName = Request::input('first_name');
        $lastName = Request::input('last_name');

        $successful = App::get('builder')->insert('people', [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        if ($successful) {
            header ('Location: /');
        } else {
            die('failed');
        }
    }


    public function delete(){

        $id = Request::input('person');
        $successful = App::get('builder')->delete('people', $id);

        if ($successful) {
            header('Location: /');
        } else {
            die('failed');
        }
    }


    public function editform(){

        $id = Request::input('person');

        if (!$id) {
            die('A person is required!');
        }

        $person = App::get('builder')->select('people', $id);

        require 'views/edit.view.php';
    }


    public function edit(){

        $id = Request::input('id');
        $firstName = Request::input('first_name');
        $lastName = Request::input('last_name');

        $successful = App::get('builder')->update('people', $id, [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        if ($successful) {
            header('Location: /');
        } else {
            die('failed');
        }
    }



}
