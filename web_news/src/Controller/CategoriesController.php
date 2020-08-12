<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if($this->Authentication->getIdentityData('level') === 1){
            $this->viewBuilder()->setLayout('backend');
            $this->paginate = [
                'contain' => ['ParentCategories'],
            ];
            $categories = $this->paginate($this->Categories);
            $this->set(compact('categories'));
        }else{
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
    }


    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
            $category = $this->Categories->get($id, [
                'contain' => ['ParentCategories', 'Articles', 'ChildCategories'],
            ]);

            $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Authentication->getIdentityData('level') === 1){
            $category = $this->Categories->newEmptyEntity();
            if ($this->request->is('post')) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('Thêm danh mục thành công !!!'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Thêm danh mục không thành công, thử lại !!!'));
            }
            $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
            $this->set(compact('category', 'parentCategories'));
        }else{
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Authentication->getIdentityData('level') === 1){
            $category = $this->Categories->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('Sửa danh mục thành công!!!'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Sửa danh mục thất bại, thử lại!!!'));
            }
            $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
            $this->set(compact('category', 'parentCategories'));
        }else{
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Authentication->getIdentityData('level') === 1){
            $this->request->allowMethod(['post', 'delete']);
            $category = $this->Categories->get($id);
            if ($this->Categories->delete($category)) {
                $this->Flash->success(__('Xóa danh mục thành công!!!'));
            } else {
                $this->Flash->error(__('Xóa danh mục thất bại, thử lại!!!'));
            }

            return $this->redirect(['action' => 'index']);
        }else{
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
    }
}
