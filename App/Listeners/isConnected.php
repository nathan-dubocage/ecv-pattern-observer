<?php

namespace App\Listeners;

use App\Controller\Welcome;

class isConnected
{

    private $name = "isConnected";
    private $protectedRoutes = [
        '/bidule'
    ];

    public function getName()
    {
        return $this->name;
    }

    public function notify($data)
    {
        if (empty($_SESSION['username']) &&  in_array($data->getPath(), $this->protectedRoutes))
            header('location: /login');
    }
}
