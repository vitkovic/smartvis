<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tempwagons Controller
 *
 * @property \App\Model\Table\TempwagonsTable $Tempwagons
 *
 * @method \App\Model\Entity\Tempwagon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TempwagonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Timetable']
        ];
        $tempwagons = $this->paginate($this->Tempwagons);

        $this->set(compact('tempwagons'));
    }

    /**
     * View method
     *
     * @param string|null $id Tempwagon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tempwagon = $this->Tempwagons->get($id, [
            'contain' => ['Timetable']
        ]);

        $this->set('tempwagon', $tempwagon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tempwagon = $this->Tempwagons->newEntity();
        if ($this->request->is('post')) {
            $tempwagon = $this->Tempwagons->patchEntity($tempwagon, $this->request->getData());
            if ($this->Tempwagons->save($tempwagon)) {
                $this->Flash->success(__('The tempwagon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tempwagon could not be saved. Please, try again.'));
        }
        $timetable = $this->Tempwagons->Timetable->find('list', ['limit' => 200]);
        $this->set(compact('tempwagon', 'timetable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tempwagon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tempwagon = $this->Tempwagons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tempwagon = $this->Tempwagons->patchEntity($tempwagon, $this->request->getData());
            if ($this->Tempwagons->save($tempwagon)) {
                $this->Flash->success(__('The tempwagon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tempwagon could not be saved. Please, try again.'));
        }
        $timetable = $this->Tempwagons->Timetable->find('list', ['limit' => 200]);
        $this->set(compact('tempwagon', 'timetable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tempwagon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tempwagon = $this->Tempwagons->get($id);
        if ($this->Tempwagons->delete($tempwagon)) {
            $this->Flash->success(__('The tempwagon has been deleted.'));
        } else {
            $this->Flash->error(__('The tempwagon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
