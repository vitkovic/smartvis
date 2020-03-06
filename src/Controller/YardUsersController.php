<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * YardUsers Controller
 *
 * @property \App\Model\Table\YardUsersTable $YardUsers
 *
 * @method \App\Model\Entity\YardUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class YardUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $yardUsers = $this->paginate($this->YardUsers);

        $this->set(compact('yardUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Yard User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $yardUser = $this->YardUsers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('yardUser', $yardUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $yardUser = $this->YardUsers->newEntity();
        if ($this->request->is('post')) {
            $yardUser = $this->YardUsers->patchEntity($yardUser, $this->request->getData());
            if ($this->YardUsers->save($yardUser)) {
                $this->Flash->success(__('The yard user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The yard user could not be saved. Please, try again.'));
        }
        $users = $this->YardUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('yardUser', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Yard User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $yardUser = $this->YardUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $yardUser = $this->YardUsers->patchEntity($yardUser, $this->request->getData());
            if ($this->YardUsers->save($yardUser)) {
                $this->Flash->success(__('The yard user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The yard user could not be saved. Please, try again.'));
        }
        $users = $this->YardUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('yardUser', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Yard User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $yardUser = $this->YardUsers->get($id);
        if ($this->YardUsers->delete($yardUser)) {
            $this->Flash->success(__('The yard user has been deleted.'));
        } else {
            $this->Flash->error(__('The yard user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
