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
        $this->Authentication->addUnauthenticatedActions(['index','about','contact','post','select','search']);
    }
    public function index(){
        $search = $this->request->getData('search');
        // exit("hello");
        if($search){
            // exit($search);
            $this->viewBuilder()->setLayout('master');
        $articles = $this->getTableLocator()->get('Articles');
        $categories = $this->getTableLocator()->get('Categories');
        $query = $categories->find('all');
        $this->paginate = [
            'contain' => ['Categories', 'Users']
        ];
        $this->set('categories',$query);
        
        $this->set('articles', $this->paginate($articles->find()->where(['publish'=>true])->where(['OR' => ['content LIKE' => '%' . $search . '%','title LIKE' => '%' . $search . '%']])->order(['Articles.modified' => 'DESC'])));
        }else{
            $this->viewBuilder()->setLayout('master');
            $articles = $this->getTableLocator()->get('Articles');
            $categories = $this->getTableLocator()->get('Categories');
            $query = $categories->find('all');
            // $query = $articles->find();
            $this->paginate = [
                'contain' => ['Categories', 'Users']
            ];
            $this->set('categories',$query);
            
            $this->set('articles', $this->paginate($articles->find()->where(['publish'=>true])->order(['Articles.modified' => 'DESC'])));
        }
        
        // $this->render('/element/nav');
    }

    public function select($id = null){
        // exit("hello");
        $this->viewBuilder()->setLayout('master');
        $articles = $this->getTableLocator()->get('Articles');
        $categories = $this->getTableLocator()->get('Categories');
        $query = $categories->find('all');
        $cate = $categories->find()->where(['id'=>$id]);
        // $query = $articles->find();
        $this->paginate = [
            'contain' => ['Categories', 'Users']
        ];
        $this->set('categories',$query);
        $this->set('category',$cate);
        
        $this->set('articles', $this->paginate($articles->find()->where(['publish'=>true, 'category_id'=> $id])->order(['Articles.modified' => 'DESC'])));
        // $this->render('/element/nav');
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
        $categories = $this->getTableLocator()->get('Categories');
        $cate = $categories->find('all');
        $query = $articles->find()->where(['id'=>$id,'publish'=>true]);
        $query = $articles->get($id, [
            'contain' => ['Categories', 'Users'],
        ]);
        $this->set('categories',$cate);
        // foreach ($query as $value) {
        //     echo $value;
        // }
        $this->set('article',$query);
    }

    // public function search(){
    //     $search = $this->request->getData('search');
    //     // exit($this->request->getData('search'));
    //     $this->viewBuilder()->setLayout('master');
    //     $articles = $this->getTableLocator()->get('Articles');
    //     $categories = $this->getTableLocator()->get('Categories');
    //     $query = $categories->find('all');
    //     $this->paginate = [
    //         'contain' => ['Categories', 'Users']
    //     ];
    //     $this->set('categories',$query);
        
    //     $this->set('articles', $this->paginate($articles->find()->where(['publish'=>true])->where(['title LIKE' => '%' . $search . '%'])->order(['Articles.modified' => 'DESC'])));
    // }
}
