<?php

namespace lalocespedes\Controllers;

use lalocespedes\Models\Users;

class HomeController

{
    public function index(Users $users)
    {
        dump($users->all());
    }
}
