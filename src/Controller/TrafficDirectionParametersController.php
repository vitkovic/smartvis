<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrafficDirectionParameters Controller
 *
 * @property \App\Model\Table\TrafficDirectionParametersTable $TrafficDirectionParameters
 *
 * @method \App\Model\Entity\TrafficDirectionParameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrafficDirectionParametersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $trafficDirectionParameters = $this->paginate($this->TrafficDirectionParameters);

        $this->set(compact('trafficDirectionParameters'));
    }

    /**
     * View method
     *
     * @param string|null $id Traffic Direction Parameter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trafficDirectionParameter = $this->TrafficDirectionParameters->get($id, [
            'contain' => []
        ]);

        $this->set('trafficDirectionParameter', $trafficDirectionParameter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trafficDirectionParameter = $this->TrafficDirectionParameters->newEntity();
        if ($this->request->is('post')) {
            $trafficDirectionParameter = $this->TrafficDirectionParameters->patchEntity($trafficDirectionParameter, $this->request->getData());
            if ($this->TrafficDirectionParameters->save($trafficDirectionParameter)) {
                $this->Flash->success(__('The traffic direction parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traffic direction parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('trafficDirectionParameter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Traffic Direction Parameter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trafficDirectionParameter = $this->TrafficDirectionParameters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trafficDirectionParameter = $this->TrafficDirectionParameters->patchEntity($trafficDirectionParameter, $this->request->getData());
            if ($this->TrafficDirectionParameters->save($trafficDirectionParameter)) {
                $this->Flash->success(__('The traffic direction parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traffic direction parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('trafficDirectionParameter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Traffic Direction Parameter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trafficDirectionParameter = $this->TrafficDirectionParameters->get($id);
        if ($this->TrafficDirectionParameters->delete($trafficDirectionParameter)) {
            $this->Flash->success(__('The traffic direction parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The traffic direction parameter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
