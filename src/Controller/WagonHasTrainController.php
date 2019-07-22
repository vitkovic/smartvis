<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * WagonHasTrain Controller
 *
 * @property \App\Model\Table\WagonHasTrainTable $WagonHasTrain
 *
 * @method \App\Model\Entity\WagonHasTrain[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WagonHasTrainController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Wagon', 'Train']
        ];
        $wagonHasTrain = $this->paginate($this->WagonHasTrain);

        $this->set(compact('wagonHasTrain'));
    }

    /**
     * View method
     *
     * @param string|null $id Wagon Has Train id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wagonHasTrain = $this->WagonHasTrain->get($id, [
            'contain' => ['Wagon', 'Train']
        ]);

        $this->set('wagonHasTrain', $wagonHasTrain);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wagonHasTrain = $this->WagonHasTrain->newEntity();
        
        
       if ($this->request->is('post')) {
           $reqdata = $this->request->getData();
           
          // print_r($reqdata);
           if ($reqdata['multi'] == 'm') {
               
               $train_id = $reqdata['Train_id'];
               $wagons_ids =  $reqdata['Wagon_id'];
               
               foreach ( $wagons_ids as $id) {
                   $wagontrains[] = array('Wagon_id'=>$id,'Train_id'=> $train_id);
               }
              // print_r($wagontrains);
               $wagonhastrainTable =  TableRegistry::getTableLocator()->get('WagonHasTrain');
               $entities = $wagonhastrainTable->newEntities($wagontrains);
               $result =  $wagonhastrainTable->saveMany($entities);
               
               if ($result) {
                   $this->Flash->success(__('The wagons for train have been saved.'));
                   
                   return $this->redirect(['action' => 'index']);
               } else {
                   $this->Flash->error(__('The wagons has train could not be saved. Please, try again.'));
                   return $this->redirect(['action' => 'index']);
               }
           }
           
            $wagonHasTrain = $this->WagonHasTrain->patchEntity($wagonHasTrain, $this->request->getData());
            if ($this->WagonHasTrain->save($wagonHasTrain)) {
                $this->Flash->success(__('The wagon has train has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon has train could not be saved. Please, try again.'));
        
            
        
        }
        $wagons = $this->WagonHasTrain->Wagon->find('list', ['keyField' => 'ID_Wagon','valueField' => 'Description','limit' => 500]);
        $trains = $this->WagonHasTrain->Train->find('list', ['keyField' => 'ID_Train','valueField' => 'Train_Number','limit' => 500]);
       
      
        $this->set(compact('wagonHasTrain', 'wagons', 'trains'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wagon Has Train id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wagonHasTrain = $this->WagonHasTrain->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wagonHasTrain = $this->WagonHasTrain->patchEntity($wagonHasTrain, $this->request->getData());
            if ($this->WagonHasTrain->save($wagonHasTrain)) {
                $this->Flash->success(__('The wagon has train has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wagon has train could not be saved. Please, try again.'));
        }
        $wagons = $this->WagonHasTrain->Wagon->find('list', ['keyField' => 'ID_Wagon','valueField' => 'Description','limit' => 500]);
        $trains = $this->WagonHasTrain->Train->find('list', ['keyField' => 'ID_Train','valueField' => 'Train_Number','limit' => 500]);
        $this->set(compact('wagonHasTrain', 'wagons', 'trains'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wagon Has Train id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wagonHasTrain = $this->WagonHasTrain->get($id);
        if ($this->WagonHasTrain->delete($wagonHasTrain)) {
            $this->Flash->success(__('The wagon has train has been deleted.'));
        } else {
            $this->Flash->error(__('The wagon has train could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
