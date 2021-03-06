<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
/**
 * Wagon Controller
 *
 * @property \App\Model\Table\WagonTable $Wagon
 *
 * @method \App\Model\Entity\Wagon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WagonController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Destination', 'People']
        ];
        $wagon = $this->paginate($this->Wagon);

        $this->set(compact('wagon'));
    }

    /**
     * View method
     *
     * @param string|null $id Wagon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wagon = $this->Wagon->get($id, [
            'contain' => ['Destination', 'People', 'Drawing']
        ]);

        $this->set('wagon', $wagon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wagon = $this->Wagon->newEntity();
        if ($this->request->is('post')) {
            $wagon = $this->Wagon->patchEntity($wagon, $this->request->getData());
            $connection = ConnectionManager::get('default');
           
            if ($this->Wagon->save($wagon)) {
              //  print_r($this->Wagon);
                $this->Flash->success(__('The wagon has been saved.'));
                $del = $connection->execute("delete from wagon_has_sidings where ID_Wagon={$wagon->ID_wagon}");
                
                $wagons = $connection->execute("insert into wagon_has_sidings (ID_Wagon, ID_Sidings, label, position) VALUES
                                        ({$wagon->ID_wagon},32,'I3',1)");

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon could not be saved. Please, try again.'));
        }
        $destination = $this->Wagon->Destination->find('list', ['limit' => 200]);
        $people = $this->Wagon->People->find('list', ['limit' => 200]);
        $this->set(compact('wagon', 'destination', 'people'));
        
     
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Wagon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wagon = $this->Wagon->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wagon = $this->Wagon->patchEntity($wagon, $this->request->getData());
            if ($this->Wagon->save($wagon)) {
                $this->Flash->success(__('The wagon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon could not be saved. Please, try again.'));
        }
        $destination = $this->Wagon->Destination->find('list', ['limit' => 200]);
        $people = $this->Wagon->People->find('list', ['limit' => 200]);
        $this->set(compact('wagon', 'destination', 'people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wagon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wagon = $this->Wagon->get($id);
        if ($this->Wagon->delete($wagon)) {
            $this->Flash->success(__('The wagon has been deleted.'));
        } else {
            $this->Flash->error(__('The wagon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
