<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locomotive Controller
 *
 * @property \App\Model\Table\LocomotiveTable $Locomotive
 *
 * @method \App\Model\Entity\Locomotive[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocomotiveController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $locomotive = $this->paginate($this->Locomotive);

        $this->set(compact('locomotive'));
    }

    /**
     * View method
     *
     * @param string|null $id Locomotive id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locomotive = $this->Locomotive->get($id, [
            'contain' => ['TrainHasLocomotive']
        ]);

        $this->set('locomotive', $locomotive);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locomotive = $this->Locomotive->newEntity();
        if ($this->request->is('post')) {
            $locomotive = $this->Locomotive->patchEntity($locomotive, $this->request->getData());
            if ($this->Locomotive->save($locomotive)) {
                $this->Flash->success(__('The locomotive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locomotive could not be saved. Please, try again.'));
        }
        $this->set(compact('locomotive'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Locomotive id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locomotive = $this->Locomotive->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locomotive = $this->Locomotive->patchEntity($locomotive, $this->request->getData());
            if ($this->Locomotive->save($locomotive)) {
                $this->Flash->success(__('The locomotive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locomotive could not be saved. Please, try again.'));
        }
        $this->set(compact('locomotive'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Locomotive id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locomotive = $this->Locomotive->get($id);
        if ($this->Locomotive->delete($locomotive)) {
            $this->Flash->success(__('The locomotive has been deleted.'));
        } else {
            $this->Flash->error(__('The locomotive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
