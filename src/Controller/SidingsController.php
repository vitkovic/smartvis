<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sidings Controller
 *
 * @property \App\Model\Table\SidingsTable $Sidings
 *
 * @method \App\Model\Entity\Siding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SidingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate =['contain' => ['Destination']];
        
        $sidings = $this->paginate($this->Sidings);

        $this->set(compact('sidings'));
    }

    /**
     * View method
     *
     * @param string|null $id Siding id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $siding = $this->Sidings->get($id, [
            'contain' => ['Destination']
        ]);

        $this->set('siding', $siding);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $siding = $this->Sidings->newEntity();
        if ($this->request->is('post')) {
            $siding = $this->Sidings->patchEntity($siding, $this->request->getData());
            if ($this->Sidings->save($siding)) {
                $this->Flash->success(__('The siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The siding could not be saved. Please, try again.'));
        }
        $destination = $this->Sidings->Destination->find('list', ['limit' => 200]);
       
        $this->set(compact('siding', 'destination'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Siding id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $siding = $this->Sidings->get($id, [
            'contain' => ['Destination']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $siding = $this->Sidings->patchEntity($siding, $this->request->getData());
            if ($this->Sidings->save($siding)) {
                $this->Flash->success(__('The siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The siding could not be saved. Please, try again.'));
        }
        $destination = $this->Sidings->Destination->find('list', ['limit' => 200]);
        
        $this->set(compact('siding', 'destination'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Siding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $siding = $this->Sidings->get($id);
        if ($this->Sidings->delete($siding)) {
            $this->Flash->success(__('The siding has been deleted.'));
        } else {
            $this->Flash->error(__('The siding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
