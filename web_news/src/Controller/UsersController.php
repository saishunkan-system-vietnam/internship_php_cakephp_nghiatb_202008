<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Session;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','register']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->Authentication->getIdentityData('email');
        if($this->Authentication->getIdentityData('level') === 1){
            $this->viewBuilder()->setLayout('backend');
            // $result = $this->Auth->user('name');
            // exit($result);
            $users = $this->paginate($this->Users);
            
            $this->set(compact('users'));
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
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Authentication->getIdentityData('level') === 1){
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Tạo thành viên thành công !!!'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Tạo thành viên thất bại !!!'));
            }
            $this->set(compact('user'));
        }else{
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('register');                   
            if ($this->request->is('post')) {
                if($this->request->getData('password') == $this->request->getData('password-confirm'))
                {
                    $user = $this->Users->newEmptyEntity();
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    $user->level = 2;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Tạo tài khoản thành công!!!'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Email đã tồn tại !!!'));
                    $this->set(compact('user'));
                }else{
                    $this->Flash->error(__('Nhập lại mật khẩu không chính xác!!!'));
                }
            }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    // public function login()
    // {
    //     $this->viewBuilder()->setLayout('login');
    //     if ($this->request->is('post')) {
    //         $user = $this->Auth->identify();
    //         if ($user) {
    //             $this->Auth->setUser($user);
    //             return $this->redirect($this->Auth->redirectUrl());
    //         }
    //         // exit('xin chào');
    //         $this->Flash->error('Your username or password is incorrect.');
    //     }
    // }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }
    public function login()
    {
        // $this->Identity->get('id');
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Tài khoản hoặc mật khẩu không chính xác !!!'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Thành viên đã được xóa !!!'));
        } else {
            $this->Flash->error(__('Thành viên chưa được xóa, vui lòng thử lại !!!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
