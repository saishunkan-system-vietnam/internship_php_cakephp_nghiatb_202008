<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class LoginController extends AppController
{
    public function index(){
        $this->viewBuilder()->setLayout('login');
    }
}