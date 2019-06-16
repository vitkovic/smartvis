<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class DeviationsController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     * 
    */
    public $deviationdata;
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
      
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Timetable',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function viewyard()
    {
             
        
      
        
    }
    public function index()
    {
       $connection = ConnectionManager::get('default');
       $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon ORDER BY wagon_has_sidings.position
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
        
        
        $timetable = $connection->execute('SELECT * FROM timetable, train where timetable.train_id = train.ID_Train
        and timetable.Arrival_Date IS NOT NULL ORDER BY timetable.Arrival_Time, timetable.Arrival_Date')->fetchAll('assoc');
        //print_r($timetable);
        $this->set(compact('timetable'));
        
    }
    public function calculateSiding($siding) {
        
        $numwagons_siding = count($siding);
        $sum = 0;
        foreach ($siding as $key => $value) {
           
            if (is_array($value)) {
                $sum += $value['Wagon_Lenght']+1;
                $siding_length = $value['Siding_lenght'];
            }
        }
        
        return  $siding_length - $sum;   
        
    }
    
    
    public function getDeviations($deviationdata) {
        $timetable = array();
        $infTimeWagons = null;
        $infTimeAmmountWagon = null;
        $infPeople = null;
        $infPeopleNum = null;
        
        // get timetable
        $timetable = array_filter($deviationdata, function ($key) {
            return strpos($key, 'timetable') === 0;
        }, ARRAY_FILTER_USE_KEY);
        
        //get deviation for time or infrastructure wagon
        $infTimeWagons = $deviationdata['radiotrain'];
        $infTimeAmmountWagon = $deviationdata['timedelay'];
      
        // People
        $infPeople = $deviationdata['workers'];
        $infPeopleNum = $deviationdata['peopledeviation'];
        //Other
        
        $allinone = array();
        
        if ($infTimeWagons != null) $allinone['timewagon'][] = $infTimeWagons;
        if ($infTimeAmmountWagon != null) $allinone['timewagon'][] = $infTimeAmmountWagon;
        if ($timetable != null && count($timetable)>0) $allinone['timetable'] = $timetable;
        if ($infPeople != null) $allinone['people'][] = $infPeople;
        if ($infPeopleNum != null) $allinone['people'][] = $infPeopleNum;
        
        $this->deviationdata = $allinone;
        //print_r($this->deviationdata);
       
    }
    
    public function processdeviation()
    {
        
        //echo "dadaadasdd";
        
        $this->getDeviations($this->request->getData());
        
       
       // print_r($deviationdata);
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute(' SELECT * FROM wagon_has_sidings, wagon, drawing,sidings, wagon_has_train,train, timetable where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label and wagon_has_train.ID_wagon = wagon.ID_wagon and timetable.Train_id = train.ID_Train
        and wagon_has_train.ID_Train = train.ID_Train
        and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon ORDER BY train.ID_Train
        ')->fetchAll('assoc');
        
       
        
        
        $new = array();
        $i = 0;
        foreach ($wagons as $key => $value) {
            
            $new[$value['ID_Train']][$i]['ID_wagon']=$value['ID_wagon'];
            $new[$value['ID_Train']][$i]['Siding_lenght']=$value['Siding_lenght'];
            $new[$value['ID_Train']][$i]['Wagon_Lenght']=$value['Wagon_Lenght'];
            $new[$value['ID_Train']][$i]['Description']=$value['Description'];
            $new[$value['ID_Train']][$i]['Position']=$value['position'];
            $new[$value['ID_Train']][$i]['label']=$value['label'];
            $new[$value['ID_Train']]['Arrival_Date'] = $value['Arrival_Date'];
            $new[$value['ID_Train']]['Arrival_Time'] = $value['Arrival_Time'];
            $new[$value['ID_Train']]['Dispatch_Date'] = $value['Dispatch_Date'];
            $new[$value['ID_Train']]['Dispatch_Time'] = $value['Dispatch_Time'];
            $new[$value['ID_Train']]['Source'] = $value['Source'];
            $new[$value['ID_Train']]['Destination'] = $value['Destination'];
            $i++;
        }
        foreach ($new as $key => $value) {
            $new[$key]['allowed_length'] = $this->calculateSiding($value);
            $i++;
        }
        
        $connection = ConnectionManager::get('default');
        $incomingTrains = $connection->execute(' SELECT * FROM timetable, train where
        timetable.Train_id = train.ID_Train and train.In_Out_Train=1 ORDER BY timetable.Arrival_Time')->fetchAll('assoc');
          
        $newIncoming = array();
        $i = 0;
        foreach ($incomingTrains as $key => $value) {
            
            $newIncoming[$value['ID_Timetable']]['Arrival_Date'] = $value['Arrival_Date'];
            $newIncoming[$value['ID_Timetable']]['Arrival_Time'] = $value['Arrival_Time'];
            $newIncoming[$value['ID_Timetable']]['Dispatch_Date'] = $value['Dispatch_Date'];
            $newIncoming[$value['ID_Timetable']]['Dispatch_Time'] = $value['Dispatch_Time'];
            $newIncoming[$value['ID_Timetable']]['Source'] = $value['Source'];
            $newIncoming[$value['ID_Timetable']]['Destination'] = $value['Destination'];
            $newIncoming[$value['ID_Timetable']]['TrainLength'] = $value['Train_Lenght_In_Meters'];
            $newIncoming[$value['ID_Timetable']]['ID_Train'] = $value['ID_Timetable'];
            $newIncoming[$value['ID_Timetable']]['Num_Wagons'] = $value['Train_Composition'];
            $i++;
        }
        
        
        $connection = ConnectionManager::get('default');
        $newSidings = $connection->execute(' SELECT * FROM   sidings,drawing WHERE  NOT EXISTS
                     (SELECT * FROM wagon_has_sidings WHERE 
                        wagon_has_sidings.ID_sidings =sidings.IDsidings) 
                    and sidings.IDsidings = drawing.sidings_id and drawing.sidings_g_m Like "C%" GROUP BY sidings.IDsidings')->fetchAll('assoc');
      // echo "<pre>"; 
      // print_r($newSidings);
      // echo "</pre>"; 
       // $deviationdata['nodeviations']=1;
        
        if ($this->deviationdata['timewagon'][0]==-1) {
           // echo "sdslkajdlsdjdlkj";
            $this->getRecommendations($newIncoming,$newSidings);
           
        } else {
            $this->getRecommendationsForDeviations($newIncoming,$newSidings);
        }
    }
    
    public function  getRecommendationsForDeviations($newIncoming,$newSidings){
        //print_r($this->deviationdata);
        $latetime = null; $newarrivaltime = null;
        $timetablearr = $this->deviationdata['timetable'];
        print_r($timetablearr);
        foreach ($timetablearr as $dtkey => $dvalue) {
            $idarr = explode('_',$dtkey);
            $id = $idarr[1];
            //echo $id;
            foreach ($newIncoming as $key => $value) { 
               // echo $id."  -  ".$key;
                if ((string)$key == (string)$id) {
                   // echo $id;
                    $arrivaltime = strtotime($value['Arrival_Time']);
                    $newarrivaltime = strtotime("+ ".$this->deviationdata['timewagon'][1]." minutes",$arrivaltime );
                   // echo "+ " + $this->deviationdata['timewagon'][1] + " minutes";
                    $latetime = date("H:i:s", $newarrivaltime);
                   
                }
            }
        }
        
        foreach ($newIncoming as $key => $value) {
            
            $timetabletrainarrival = strtotime($value['Arrival_Time']);
            
            if ($newarrivaltime > $timetabletrainarrival) {
                $trainsbefore[$key] = $value;
            }
            
        }
        
        
        $MaxWagonLength = 20;
        $MinDistanceLength = 1;
        /*
        echo "<pre>";
        print_r($trainsbefore);
        echo "</pre>";
        
        echo "<pre>";
        print_r($newSidings);
        echo "</pre>";
        */
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon ORDER BY wagon_has_sidings.position
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
            $new[$key]['num_wagons'] = floor($new[$key]['allowed_length']/($MaxWagonLength-$MinDistanceLength));
            $i++;
            foreach ($trainsbefore as $bkey=>$bvalue) {
                
                if ($bvalue['Num_Wagons'] <  $new[$key]['num_wagons']) {
                    $possiblesidings[$key][$bkey]=$bvalue;
                }
                
            }
            
        }
        /*
        echo "<pre>";
        print_r($new);
        echo "</pre>";
        */
        echo "<pre>";
        print_r($possiblesidings);
        echo "</pre>";
        
        
        
        
    }
    
    
    public function getRecommendations($newIncoming,$newSidings) {
        
        $filtereddata = array_filter($this->deviationdata['timetable'], function ($key) {
            return strpos($key, 'timetable') === 0;
        }, ARRAY_FILTER_USE_KEY);
            
            // print_r($filtereddata);
            foreach ($filtereddata as $key=>$value) {
                $timetablekey = $key;
                $timetableid = $value;
            }
            
            //  echo $timetableid;
            $TrainLength = $newIncoming[$timetableid]['TrainLength'];
            // echo $TrainLength."dgdgd";
            
            $possitions = 0;
            
            
            foreach ($newSidings as $key => $value) {
                
                if ((float)$value['Siding_lenght']>(float)$TrainLength) {
                    
                    $possitions = 1;
                    
                    $possiblesidings[$key] = $value;
                    
                }
                
            }
            
            
            
            foreach ( $possiblesidings as $key => $value) {
                
                $possidings[$value['sidings_g_m']]['TrainLength'] = $TrainLength;
                $possidings[$value['sidings_g_m']]['SidingLength'] = $value['Siding_lenght'];
            }
            
            
            $connection = ConnectionManager::get('default');
            $wagons = $connection->execute('SELECT * FROM wagon_has_sidings, wagon, drawing,sidings where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label
         and sidings.IDSidings = drawing.sidings_id GROUP BY wagon.ID_wagon ORDER BY wagon_has_sidings.position
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
            $this->set('add_sidings',$possidings);
            
            $messageTextStart = "You can put your train into the following sidings:";
            $messageTextEnd = "If looks like some of the sidings are empty, but You are not allowed to put wagons there, then,<br> You should check if every wagon is properly entered to the system (In infrastructure part of the app)<br>";
            $this->set('mssStart', $messageTextStart);
            $this->set('mssEnd', $messageTextEnd);
            
            return;
            
    }
}
