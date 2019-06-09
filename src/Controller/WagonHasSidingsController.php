<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

/**
 * WagonHasSidings Controller
 *
 * @property \App\Model\Table\WagonHasSidingsTable $WagonHasSidings
 *
 * @method \App\Model\Entity\WagonHasSiding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WagonHasSidingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wagonHasSidings = $this->paginate($this->WagonHasSidings);

        $this->set(compact('wagonHasSidings'));
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $this->set(compact('wagons'));
        
        
    }

    /**
     * View method
     *
     * @param string|null $id Wagon Has Siding id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wagonHasSiding = $this->WagonHasSidings->get($id, [
            'contain' => []
        ]);

        $this->set('wagonHasSiding', $wagonHasSiding);
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $this->set(compact('wagons'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wagonHasSiding = $this->WagonHasSidings->newEntity();
        if ($this->request->is('post')) {
            $wagonHasSiding = $this->WagonHasSidings->patchEntity($wagonHasSiding, $this->request->getData());
            if ($this->WagonHasSidings->save($wagonHasSiding)) {
                $this->Flash->success(__('The wagon has siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon has siding could not be saved. Please, try again.'));
        }
        $this->set(compact('wagonHasSiding'));
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $this->set(compact('wagons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wagon Has Siding id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wagonHasSiding = $this->WagonHasSidings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wagonHasSiding = $this->WagonHasSidings->patchEntity($wagonHasSiding, $this->request->getData());
            if ($this->WagonHasSidings->save($wagonHasSiding)) {
                $this->Flash->success(__('The wagon has siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon has siding could not be saved. Please, try again.'));
        }
        $this->set(compact('wagonHasSiding'));
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $this->set(compact('wagons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wagon Has Siding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wagonHasSiding = $this->WagonHasSidings->get($id);
        if ($this->WagonHasSidings->delete($wagonHasSiding)) {
            $this->Flash->success(__('The wagon has siding has been deleted.'));
        } else {
            $this->Flash->error(__('The wagon has siding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}