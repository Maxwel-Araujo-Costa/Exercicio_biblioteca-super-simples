<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use  Cake\Utility\Security;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $components = array('RequestHandler');



    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

        $this->set('users', $this->Paginator->paginate($this->Users));
        $this->set('_serialize', array('add'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //$key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';
            //$user->password = Security::encrypt($user->password, $key);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        //$key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';
        //$this->user = Security::decrypt($user->password, $key);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$user->password = Security::encrypt($user->password, $key);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {

            $usuario = $this->request->getData('email');
            $senha = $this->request->getData('password');
            $user = $this->Users->find('all', [
                'conditions' => [
                    'Users.email' => $usuario,
                    'Users.password' => $senha,
                ],
            ])->first();

            if ($user) {
                $this->Auth->setUser($user);
                //return $this->redirect('/users');
                return $this->redirect($this->Auth->redirectUrl());
            }
            //return $this->redirect('/users/login');
            return $this->Flash->error('Your email or password is incorrect.');
        }
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
    }
}
