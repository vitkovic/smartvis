<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Train Controller
 *
 * @property \App\Model\Table\TrainTable $Train
 *
 * @method \App\Model\Entity\Train[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $train = $this->paginate($this->Train);

        $this->set(compact('train'));
    }

    /**
     * View method
     *
     * @param string|null $id Train id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $train = $this->Train->get($id, [
            'contain' => []
        ]);

        $this->set('train', $train);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $train = $this->Train->newEntity();
        if ($this->request->is('post')) {
            $train = $this->Train->patchEntity($train, $this->request->getData());
            if ($this->Train->save($train)) {
                $this->Flash->success(__('The train has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train could not be saved. Please, try again.'));
        }
        $this->set(compact('train'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Train id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $train = $this->Train->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $train = $this->Train->patchEntity($train, $this->request->getData());
            if ($this->Train->save($train)) {
                $this->Flash->success(__('The train has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train could not be saved. Please, try again.'));
        }
        $this->set(compact('train'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Train id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $train = $this->Train->get($id);
        if ($this->Train->delete($train)) {
            $this->Flash->success(__('The train has been deleted.'));
        } else {
            $this->Flash->error(__('The train could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
