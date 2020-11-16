<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
/**
 * TrainHasSiding Controller
 *
 * @property \App\Model\Table\TrainHasSidingTable $TrainHasSiding
 *
 * @method \App\Model\Entity\TrainHasSiding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainHasSidingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Train', 'Sidings']
        ];
        $trainHasSiding = $this->paginate($this->TrainHasSiding);

        $this->set(compact('trainHasSiding'));
        
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $new = array();
        $i = 0;
        foreach ($wagons as $key => $value) {
            
            $new[$value['label']][$i]['ID_wagon']=$value['ID_wagon'];
            $new[$value['label']][$i]['Siding_lenght']=$value['Siding_lenght'];
            $new[$value['label']][$i]['Wagon_Lenght']=$value['Wagon_Lenght'];
            $new[$value['label']][$i]['Description']=$value['Description'];
            $new[$value['label']][$i]['Position']=$value['position'];
            
            $i++;
        }
        foreach ($new as $key => $value) {
            $new[$key]['allowed_length'] = $this->calculateSiding($value);
            $i++;
        }
        
        $this->set(compact('wagons'));
        $this->set('wagons_sidings',$new);
    }

    /**
     * View method
     *
     * @param string|null $id Train Has Siding id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainHasSiding = $this->TrainHasSiding->get($id, [
            'contain' => ['Train', 'Sidings']
        ]);

        $this->set('trainHasSiding', $trainHasSiding);
        
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $new = array();
        $i = 0;
        foreach ($wagons as $key => $value) {
            
            $new[$value['label']][$i]['ID_wagon']=$value['ID_wagon'];
            $new[$value['label']][$i]['Siding_lenght']=$value['Siding_lenght'];
            $new[$value['label']][$i]['Wagon_Lenght']=$value['Wagon_Lenght'];
            $new[$value['label']][$i]['Description']=$value['Description'];
            $new[$value['label']][$i]['Position']=$value['position'];
            
            $i++;
        }
        foreach ($new as $key => $value) {
            $new[$key]['allowed_length'] = $this->calculateSiding($value);
            $i++;
        }
        
        $this->set(compact('wagons'));
        $this->set('wagons_sidings',$new);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainHasSiding = $this->TrainHasSiding->newEntity();
        if ($this->request->is('post')) {
            $trainHasSiding = $this->TrainHasSiding->patchEntity($trainHasSiding, $this->request->getData());
            if ($this->TrainHasSiding->save($trainHasSiding)) {
                $this->Flash->success(__('The train has siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train has siding could not be saved. Please, try again.'));
        }
        $trains = $this->TrainHasSiding->Train->find('list', ['keyField' => 'ID_Train','valueField' => 'Train_Number','limit' => 500]);
        $sidings = $this->TrainHasSiding->Sidings->find('list',['limit' => 500]);
        
        $this->set(compact('trainHasSiding', 'trains', 'sidings'));
        
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $sidings = $connection->execute('SELECT * FROM drawing where sidings_id != "" AND sidings_id != 0 AND sidings_id IS NOT NULL ORDER BY drawing.sidings_id')->fetchAll('assoc');
        
        $new = array();
        $i = 0;
        foreach ($wagons as $key => $value) {
            
            $new[$value['label']][$i]['ID_wagon']=$value['ID_wagon'];
            $new[$value['label']][$i]['Siding_lenght']=$value['Siding_lenght'];
            $new[$value['label']][$i]['Wagon_Lenght']=$value['Wagon_Lenght'];
            $new[$value['label']][$i]['Description']=$value['Description'];
            $new[$value['label']][$i]['Position']=$value['position'];
            
            $i++;
        }
        foreach ($new as $key => $value) {
            $new[$key]['allowed_length'] = $this->calculateSiding($value);
            $i++;
        }
        
        $this->set(compact('wagons'));
        $this->set(compact('sidings'));
        $this->set('wagons_sidings',$new);
     //   print_r($wagons);
    }

    /**
     * Edit method
     *
     * @param string|null $id Train Has Siding id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainHasSiding = $this->TrainHasSiding->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainHasSiding = $this->TrainHasSiding->patchEntity($trainHasSiding, $this->request->getData());
            if ($this->TrainHasSiding->save($trainHasSiding)) {
                $this->Flash->success(__('The train has siding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train has siding could not be saved. Please, try again.'));
        }
        $trains = $this->TrainHasSiding->Train->find('list', ['keyField' => 'ID_Train','valueField' => 'Train_Number','limit' => 500]);
        $sidings = $this->TrainHasSiding->Sidings->find('list',['limit' => 500]);
        
        $this->set(compact('trainHasSiding', 'trains', 'sidings'));
        
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        $new = array();
        $i = 0;
        foreach ($wagons as $key => $value) {
            
            $new[$value['label']][$i]['ID_wagon']=$value['ID_wagon'];
            $new[$value['label']][$i]['Siding_lenght']=$value['Siding_lenght'];
            $new[$value['label']][$i]['Wagon_Lenght']=$value['Wagon_Lenght'];
            $new[$value['label']][$i]['Description']=$value['Description'];
            $new[$value['label']][$i]['Position']=$value['position'];
            
            $i++;
        }
        foreach ($new as $key => $value) {
            $new[$key]['allowed_length'] = $this->calculateSiding($value);
            $i++;
        }
        
        $this->set(compact('wagons'));
        $this->set('wagons_sidings',$new);
    }

    /**
     * Delete method
     *
     * @param string|null $id Train Has Siding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainHasSiding = $this->TrainHasSiding->get($id);
        if ($this->TrainHasSiding->delete($trainHasSiding)) {
            $this->Flash->success(__('The train has siding has been deleted.'));
        } else {
            $this->Flash->error(__('The train has siding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function calculateSiding($siding) {
        
        $numwagons_siding = count($siding);
        $sum = 0;
        foreach ($siding as $key => $value) {
            
            
            $sum += $value['Wagon_Lenght']+1;
            $siding_length = $value['Siding_lenght'];
        }
        
        return  $siding_length - $sum;
        
    }
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
