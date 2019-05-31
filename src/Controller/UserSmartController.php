<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSmart Controller
 *
 * @property \App\Model\Table\UserSmartTable $UserSmart
 *
 * @method \App\Model\Entity\UserSmart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSmartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userSmart = $this->paginate($this->UserSmart);

        $this->set(compact('userSmart'));
    }

    /**
     * View method
     *
     * @param string|null $id User Smart id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSmart = $this->UserSmart->get($id, [
            'contain' => []
        ]);

        $this->set('userSmart', $userSmart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSmart = $this->UserSmart->newEntity();
        if ($this->request->is('post')) {
            $userSmart = $this->UserSmart->patchEntity($userSmart, $this->request->getData());
            if ($this->UserSmart->save($userSmart)) {
                $this->Flash->success(__('The user smart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user smart could not be saved. Please, try again.'));
        }
        $this->set(compact('userSmart'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Smart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSmart = $this->UserSmart->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSmart = $this->UserSmart->patchEntity($userSmart, $this->request->getData());
            if ($this->UserSmart->save($userSmart)) {
                $this->Flash->success(__('The user smart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user smart could not be saved. Please, try again.'));
        }
        $this->set(compact('userSmart'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Smart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSmart = $this->UserSmart->get($id);
        if ($this->UserSmart->delete($userSmart)) {
            $this->Flash->success(__('The user smart has been deleted.'));
        } else {
            $this->Flash->error(__('The user smart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
