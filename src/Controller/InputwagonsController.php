<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inputwagons Controller
 *
 * @property \App\Model\Table\InputwagonsTable $Inputwagons
 *
 * @method \App\Model\Entity\Inputwagon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InputwagonsController extends AppController
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
        $inputwagons = $this->paginate($this->Inputwagons);

        $this->set(compact('inputwagons'));
    }

    /**
     * View method
     *
     * @param string|null $id Inputwagon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inputwagon = $this->Inputwagons->get($id, [
            'contain' => ['Timetable']
        ]);

        $this->set('inputwagon', $inputwagon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inputwagon = $this->Inputwagons->newEntity();
        if ($this->request->is('post')) {
            $inputwagon = $this->Inputwagons->patchEntity($inputwagon, $this->request->getData());
            if ($this->Inputwagons->save($inputwagon)) {
                $this->Flash->success(__('The inputwagon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inputwagon could not be saved. Please, try again.'));
        }
        $timetable = $this->Inputwagons->Timetable->find('list', ['limit' => 200]);
        $this->set(compact('inputwagon', 'timetable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inputwagon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inputwagon = $this->Inputwagons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inputwagon = $this->Inputwagons->patchEntity($inputwagon, $this->request->getData());
            if ($this->Inputwagons->save($inputwagon)) {
                $this->Flash->success(__('The inputwagon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inputwagon could not be saved. Please, try again.'));
        }
        $timetable = $this->Inputwagons->Timetable->find('list', ['limit' => 200]);
        $this->set(compact('inputwagon', 'timetable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inputwagon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inputwagon = $this->Inputwagons->get($id);
        if ($this->Inputwagons->delete($inputwagon)) {
            $this->Flash->success(__('The inputwagon has been deleted.'));
        } else {
            $this->Flash->error(__('The inputwagon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
