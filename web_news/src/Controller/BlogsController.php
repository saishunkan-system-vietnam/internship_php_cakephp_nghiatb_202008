<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class BlogsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        // $this->viewBuilder()->setLayout('master');
        // debug($event);
        // exit;
    }
    public function index(){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
    }

    public function about(){
        // exit($id);
        $this->viewBuilder()->setLayout('master');
    }

    public function contact(){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
    }

    public function post(){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
    }
}
