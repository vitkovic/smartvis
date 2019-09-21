<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Destination Controller
 *
 * @property \App\Model\Table\DestinationTable $Destination
 *
 * @method \App\Model\Entity\Destination[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DestinationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $destination = $this->paginate($this->Destination);

        $this->set(compact('destination'));
    }

    /**
     * View method
     *
     * @param string|null $id Destination id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $destination = $this->Destination->get($id, [
            'contain' => ['Sidings', 'Wagon']
        ]);

        $this->set('destination', $destination);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $destination = $this->Destination->newEntity();
        if ($this->request->is('post')) {
            $destination = $this->Destination->patchEntity($destination, $this->request->getData());
            if ($this->Destination->save($destination)) {
                $this->Flash->success(__('The destination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destination could not be saved. Please, try again.'));
        }
        $this->set(compact('destination'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Destination id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $destination = $this->Destination->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destination = $this->Destination->patchEntity($destination, $this->request->getData());
            if ($this->Destination->save($destination)) {
                $this->Flash->success(__('The destination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destination could not be saved. Please, try again.'));
        }
        $this->set(compact('destination'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Destination id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $destination = $this->Destination->get($id);
        if ($this->Destination->delete($destination)) {
            $this->Flash->success(__('The destination has been deleted.'));
        } else {
            $this->Flash->error(__('The destination could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
