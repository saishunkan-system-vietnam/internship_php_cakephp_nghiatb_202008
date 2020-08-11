<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\Locator\LocatorAwareTrait;

class BlogsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        // $this->viewBuilder()->setLayout('master');
        // debug($event);
        // exit;
        $this->Authentication->addUnauthenticatedActions(['index','about','contact','post']);
    }
    public function index(){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
        $articles = $this->getTableLocator()->get('Articles');
        // $query = $articles->find();
        $this->paginate = [
            'contain' => ['Categories', 'Users']
        ];
        $this->set('articles', $this->paginate($articles->find()->where(['publish'=>true])->order(['Articles.modified' => 'DESC'])));
    }

    public function about(){
        // exit($id);
        $this->viewBuilder()->setLayout('master');
    }

    public function contact(){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
    }

    public function post($id){
        $this->viewBuilder()->setLayout('master');
        $articles = $this->getTableLocator()->get('Articles');
        $query = $articles->find()->where(['id'=>$id,'publish'=>true]);
        $query = $articles->get($id, [
            'contain' => ['Categories', 'Users'],
        ]);

        // foreach ($query as $value) {
        //     echo $value;
        // }
        $this->set('article',$query);
    }
}
