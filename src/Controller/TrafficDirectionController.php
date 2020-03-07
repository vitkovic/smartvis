<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrafficDirection Controller
 *
 * @property \App\Model\Table\TrafficDirectionTable $TrafficDirection
 *
 * @method \App\Model\Entity\TrafficDirection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrafficDirectionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $trafficDirection = $this->paginate($this->TrafficDirection);

        $this->set(compact('trafficDirection'));
    }

    /**
     * View method
     *
     * @param string|null $id Traffic Direction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trafficDirection = $this->TrafficDirection->get($id, [
            'contain' => []
        ]);

        $this->set('trafficDirection', $trafficDirection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trafficDirection = $this->TrafficDirection->newEntity();
        if ($this->request->is('post')) {
            $trafficDirection = $this->TrafficDirection->patchEntity($trafficDirection, $this->request->getData());
            if ($this->TrafficDirection->save($trafficDirection)) {
                $this->Flash->success(__('The traffic direction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traffic direction could not be saved. Please, try again.'));
        }
        $this->set(compact('trafficDirection'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Traffic Direction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trafficDirection = $this->TrafficDirection->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trafficDirection = $this->TrafficDirection->patchEntity($trafficDirection, $this->request->getData());
            if ($this->TrafficDirection->save($trafficDirection)) {
                $this->Flash->success(__('The traffic direction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traffic direction could not be saved. Please, try again.'));
        }
        $this->set(compact('trafficDirection'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Traffic Direction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trafficDirection = $this->TrafficDirection->get($id);
        if ($this->TrafficDirection->delete($trafficDirection)) {
            $this->Flash->success(__('The traffic direction has been deleted.'));
        } else {
            $this->Flash->error(__('The traffic direction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
