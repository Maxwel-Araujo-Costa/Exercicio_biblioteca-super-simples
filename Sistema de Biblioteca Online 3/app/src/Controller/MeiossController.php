<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Meioss Controller
 *
 * @property \App\Model\Table\MeiossTable $Meioss
 *
 * @method \App\Model\Entity\Meios[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeiossController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Books'],
        ];
        $meioss = $this->paginate($this->Meioss);

        $this->set(compact('meioss'));
    }

    /**
     * View method
     *
     * @param string|null $id Meios id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meios = $this->Meioss->get($id, [
            'contain' => ['Users', 'Books'],
        ]);

        $this->set('meios', $meios);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meios = $this->Meioss->newEntity();
        if ($this->request->is('post')) {
            $meios = $this->Meioss->patchEntity($meios, $this->request->getData());
            if ($this->Meioss->save($meios)) {
                $this->Flash->success(__('The meios has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meios could not be saved. Please, try again.'));
        }
        $users = $this->Meioss->Users->find('list', ['limit' => 200]);
        $books = $this->Meioss->Books->find('list', ['limit' => 200]);
        $this->set(compact('meios', 'users', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meios id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meios = $this->Meioss->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meios = $this->Meioss->patchEntity($meios, $this->request->getData());
            if ($this->Meioss->save($meios)) {
                $this->Flash->success(__('The meios has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meios could not be saved. Please, try again.'));
        }
        $users = $this->Meioss->Users->find('list', ['limit' => 200]);
        $books = $this->Meioss->Books->find('list', ['limit' => 200]);
        $this->set(compact('meios', 'users', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meios id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meios = $this->Meioss->get($id);
        if ($this->Meioss->delete($meios)) {
            $this->Flash->success(__('The meios has been deleted.'));
        } else {
            $this->Flash->error(__('The meios could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
