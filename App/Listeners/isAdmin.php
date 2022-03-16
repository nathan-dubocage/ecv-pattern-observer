<?php

namespace App\Listeners;

class isAdmin
{

    private $name = "isAdmin";
    private $protectedRoutes = [
        '/admin'
    ];

    public function getName()
    {
        return $this->name;
    }

    public function notify($data)
    {
        if (empty($_SESSION['admin']) &&  in_array($data->getPath(), $this->protectedRoutes))
            header('location: /');
    }
}
