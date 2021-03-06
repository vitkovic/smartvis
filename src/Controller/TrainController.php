<?php
namespace App\Controller;
use Cake\Utility\Xml;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


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
            'contain' => ['Locomotive','Wagon','Sidings']
        ]);
        /*
        echo "<pre>";
         print_r($train);
        echo "</pre>";
        */
      //  $trainHasLocomotives = $this->Train->Locomotive->find()->all();
        
        $trainHasLocomotives  = $this->Train->Locomotive->find()->matching('Train', function ($q) use ($id) {
            return $q->where(['Train.ID_Train = ' => $id]);
        })->all();
        
        
                  
       // $wagons = $this->Train->Wagon->find()->all();
            $wagons  = $this->Train->Wagon->find()->matching('Train', function ($q)  use ($id) {
            return $q->where(['Train.ID_Train = ' => $id]);
        })->all();
       
        
        $connection = ConnectionManager::get('default');
        $wagonstemp = $connection->execute('SELECT *,wagon_has_train.id as wid FROM wagon_has_train, wagon, train, destination  where
        wagon_has_train.Wagon_id = wagon.ID_wagon and wagon_has_train.Train_id = train.ID_Train
        and train.ID_Train = '.$id.'
        GROUP BY wagon.ID_wagon
        ')->fetchAll('assoc');
        
        //$connection = ConnectionManager::get('default');
        $destination = $connection->execute('SELECT * FROM destination')->fetchAll('assoc');
        
        
        foreach ($wagonstemp as $wagontemp) {
            foreach ($destination as $dest) {
                if ($wagontemp['destination_id']==$dest['id']) {
                    $wagontemp['Destination'] = $dest['name'];
                }
                if ($wagontemp['arrival_id']==$dest['id']) {
                    $wagontemp['Arrival'] = $dest['name'];
                }
            }
            //echo  $wagontemp['Destination'];
            $wagonstemp0[] = $wagontemp;
        }
        
        $wagonstemp= $wagonstemp0;
        
        
        $this->set('trainHasLocomotives',$trainHasLocomotives);
        $this->set('wagons',$wagons);
        $this->set(compact('train','wagonstemp'));
        
        
        
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
    public function beforeFilter()
    {
        
        $this->set('setvisibility',$this->setvisibility);
    }
}
