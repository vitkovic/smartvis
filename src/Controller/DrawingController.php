<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Drawing Controller
 *
 * @property \App\Model\Table\DrawingTable $Drawing
 *
 * @method \App\Model\Entity\Drawing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DrawingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sidings', 'Wagons']
        ];
        $drawing = $this->paginate($this->Drawing);

        $this->set(compact('drawing'));
    }

    /**
     * View method
     *
     * @param string|null $id Drawing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drawing = $this->Drawing->get($id, [
            'contain' => ['Sidings', 'Wagons']
        ]);

        $this->set('drawing', $drawing);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drawing = $this->Drawing->newEntity();
        if ($this->request->is('post')) {
            $drawing = $this->Drawing->patchEntity($drawing, $this->request->getData());
            if ($this->Drawing->save($drawing)) {
                $this->Flash->success(__('The drawing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drawing could not be saved. Please, try again.'));
        }
        $sidings = $this->Drawing->Sidings->find('list', ['limit' => 200]);
        $wagons = $this->Drawing->Wagons->find('list', ['limit' => 200]);
        $this->set(compact('drawing', 'sidings', 'wagons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Drawing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drawing = $this->Drawing->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drawing = $this->Drawing->patchEntity($drawing, $this->request->getData());
            if ($this->Drawing->save($drawing)) {
                $this->Flash->success(__('The drawing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drawing could not be saved. Please, try again.'));
        }
        $sidings = $this->Drawing->Sidings->find('list', ['limit' => 200]);
        $wagons = $this->Drawing->Wagons->find('list', ['limit' => 200]);
        $this->set(compact('drawing', 'sidings', 'wagons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drawing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drawing = $this->Drawing->get($id);
        if ($this->Drawing->delete($drawing)) {
            $this->Flash->success(__('The drawing has been deleted.'));
        } else {
            $this->Flash->error(__('The drawing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
