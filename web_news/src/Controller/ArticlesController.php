<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\App;
use Cake\Event\EventInterface;
use Cake\Filesystem\File;
use Cake\Utility\Text;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $articles = $this->getTableLocator()->get('Articles');
        $this->viewBuilder()->setLayout('backend');
        $this->paginate = [
            'contain' => ['Categories', 'Users'],
            'order' => ['created'=>'DESC']
        ];
        // $this->paginate['order'] = ['id' => 'DESC'];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Categories', 'Users'],
        ]);

        $this->set(compact('article'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articles = $this->getTableLocator()->get('Articles');
        // $categories=$articles->find('all');
        // $article->title = $this->request->getData('title');
        // $article->sub_title = $this->request->getData('sub_title');
        // $article->content = $this->request->getData('content');
        // $article->img = $this->request->getData('img');
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article->title = $this->request->getData('title');
            $article->sub_title = $this->request->getData('sub_title');
            $article->content = $this->request->getData('content');            
            $article->category_id = $this->request->getData('category_id');
            $article->user_id = $this->request->getData('user_id');
            $file=$this->request->getData('img');
            $file_name=$file->getClientFileName();
            $article->img=Text::slug($file_name).'.jpg';
            if ($this->Articles->save($article)) {
                $file->moveTo(WWW_ROOT . 'upload_file/'.$article->id.'.jpg');
                $this->Flash->success(__('Thêm bài viết thành công!!!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thêm bài viết thất bại !!!'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'users'));
    }

    public function publish($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['get'])) {
            $article->publish = true;
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Bài viết đã được publish.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Bài viết chưa được publish, vui lòng thử lại !!!'));
        }
    }
    public function unPublish($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['get'])) {
            $article->publish = false;
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Bài viết đã được publish.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Bài viết chưa được publish, vui lòng thử lại !!!'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        unlink(WWW_ROOT.'upload_file/'.$id.'.jpg');
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
