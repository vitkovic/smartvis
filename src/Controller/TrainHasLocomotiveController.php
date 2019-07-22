<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrainHasLocomotive Controller
 *
 * @property \App\Model\Table\TrainHasLocomotiveTable $TrainHasLocomotive
 *
 * @method \App\Model\Entity\TrainHasLocomotive[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainHasLocomotiveController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locomotive', 'Train']
        ];
        $trainHasLocomotive = $this->paginate($this->TrainHasLocomotive);

        $this->set(compact('trainHasLocomotive'));
    }

    /**
     * View method
     *
     * @param string|null $id Train Has Locomotive id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainHasLocomotive = $this->TrainHasLocomotive->get($id, [
            'contain' => ['Locomotive', 'Train']
        ]);

        $this->set('trainHasLocomotive', $trainHasLocomotive);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainHasLocomotive = $this->TrainHasLocomotive->newEntity();
        if ($this->request->is('post')) {
            $trainHasLocomotive = $this->TrainHasLocomotive->patchEntity($trainHasLocomotive, $this->request->getData());
            if ($this->TrainHasLocomotive->save($trainHasLocomotive)) {
                $this->Flash->success(__('The train has locomotive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train has locomotive could not be saved. Please, try again.'));
        }
        $locomotives = $this->TrainHasLocomotive->Locomotives->find('list', ['limit' => 200]);
        $trains = $this->TrainHasLocomotive->Trains->find('list', ['limit' => 200]);
        $this->set(compact('trainHasLocomotive', 'locomotives', 'trains'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Train Has Locomotive id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainHasLocomotive = $this->TrainHasLocomotive->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainHasLocomotive = $this->TrainHasLocomotive->patchEntity($trainHasLocomotive, $this->request->getData());
            if ($this->TrainHasLocomotive->save($trainHasLocomotive)) {
                $this->Flash->success(__('The train has locomotive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train has locomotive could not be saved. Please, try again.'));
        }
        $locomotives = $this->TrainHasLocomotive->Locomotives->find('list', ['limit' => 200]);
        $trains = $this->TrainHasLocomotive->Trains->find('list', ['limit' => 200]);
        $this->set(compact('trainHasLocomotive', 'locomotives', 'trains'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Train Has Locomotive id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainHasLocomotive = $this->TrainHasLocomotive->get($id);
        if ($this->TrainHasLocomotive->delete($trainHasLocomotive)) {
            $this->Flash->success(__('The train has locomotive has been deleted.'));
        } else {
            $this->Flash->error(__('The train has locomotive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
