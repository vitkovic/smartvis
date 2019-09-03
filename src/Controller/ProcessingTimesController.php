<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProcessingTimes Controller
 *
 * @property \App\Model\Table\ProcessingTimesTable $ProcessingTimes
 *
 * @method \App\Model\Entity\ProcessingTime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessingTimesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $processingTimes = $this->paginate($this->ProcessingTimes);

        $this->set(compact('processingTimes'));
    }

    /**
     * View method
     *
     * @param string|null $id Processing Time id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $processingTime = $this->ProcessingTimes->get($id, [
            'contain' => []
        ]);

        $this->set('processingTime', $processingTime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processingTime = $this->ProcessingTimes->newEntity();
        if ($this->request->is('post')) {
            $processingTime = $this->ProcessingTimes->patchEntity($processingTime, $this->request->getData());
            if ($this->ProcessingTimes->save($processingTime)) {
                $this->Flash->success(__('The processing time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processing time could not be saved. Please, try again.'));
        }
        $this->set(compact('processingTime'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Processing Time id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processingTime = $this->ProcessingTimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processingTime = $this->ProcessingTimes->patchEntity($processingTime, $this->request->getData());
            if ($this->ProcessingTimes->save($processingTime)) {
                $this->Flash->success(__('The processing time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processing time could not be saved. Please, try again.'));
        }
        $this->set(compact('processingTime'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Processing Time id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processingTime = $this->ProcessingTimes->get($id);
        if ($this->ProcessingTimes->delete($processingTime)) {
            $this->Flash->success(__('The processing time has been deleted.'));
        } else {
            $this->Flash->error(__('The processing time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
