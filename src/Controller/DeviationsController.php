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
use DateTime;

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
    public $addtime = 10;
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
        and timetable.Arrival_Date IS NOT NULL ORDER BY timetable.Arrival_Date, timetable.Arrival_Time')->fetchAll('assoc');
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
        $otherdata = $deviationdata['otherdeviation'];
        
        $allinone = array();
        
        if ($infTimeWagons != null) $allinone['timewagon'][] = $infTimeWagons;
        if ($infTimeWagons != null && $infTimeWagons==1) $allinone['wagon'] = 1;
        if ($infTimeAmmountWagon != null) $allinone['timewagon'][] = $infTimeAmmountWagon;
        if ($timetable != null && count($timetable)>0) $allinone['timetable'] = $timetable;
        if ($infPeople != null) $allinone['people'][] = $infPeople;
        if ($infPeopleNum != null) $allinone['people'][] = $infPeopleNum;
        if ($otherdata != null) $allinone['otherdeviation'] = $otherdata;
        
        $this->deviationdata = $allinone;
      //  print_r($this->deviationdata);
       
    }
    
    public function processdeviation()
    {
        
        //echo "dadaadasdd";
        
        $this->getDeviations($this->request->getData());
        
       
       // print_r($deviationdata);
        
        $connection = ConnectionManager::get('default');
        $wagons = $connection->execute(' SELECT * FROM wagon_has_sidings, wagon, drawing,sidings, wagon_has_train,train, timetable where
        wagon_has_sidings.ID_wagon = wagon.ID_wagon and drawing.sidings_g_m = wagon_has_sidings.label and wagon_has_train.Wagon_id = wagon.ID_wagon and timetable.Train_id = train.ID_Train
        and wagon_has_train.Train_id = train.ID_Train
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
        timetable.Train_id = train.ID_Train and train.In_Out_Train=1 ORDER BY timetable.Arrival_Date, timetable.Arrival_Time')->fetchAll('assoc');
          
        $newIncoming = array();
        $i = 0;
        foreach ($incomingTrains as $key => $value) {
            
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Arrival_Date'] = $value['Arrival_Date'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Calculated_Arrival_Date'] = strtotime($value['Arrival_Date']);
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Arrival_Time'] = $value['Arrival_Time'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Calculated_Arrival_Time'] = strtotime($value['Arrival_Date'].' '.$value['Arrival_Time']);
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Dispatch_Date'] = $value['Dispatch_Date'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Dispatch_Time'] = $value['Dispatch_Time'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Calculated_Dispatch_Time'] = strtotime($value['Dispatch_Date'].' '.$value['Dispatch_Time']);
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Source'] = $value['Source'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Destination'] = $value['Destination'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['TrainLength'] = $value['Train_Lenght_In_Meters'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['ID_Train'] = $value['ID_Timetable'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Num_Wagons'] = $value['Train_Composition'];
            $newIncoming['timetablelist'][$value['ID_Timetable']]['Train_Number'] = $value['Train_Number'];
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
       // $deviationdata['nodeviations ']=1;
        
                  // echo "sdslkajdlsdjdlkj";
            
            
        
        if ($this->deviationdata['wagon'] == 1) {
            $messages = $this->getRecommendationsForWagon($newIncoming,$newSidings);
        } else if ($this->deviationdata['otherdeviation']!='') {
            $messages = $this->getRecommendationsForOtherDeviation($newIncoming,$newSidings);
        } else {
            $messages = $this->getRecommendations($newIncoming,$newSidings);
        }
        
                    
        $this->set('messages',$messages);
            
     }
    
     public function getRecommendationsForWagon($newIncoming,$newSidings=null) {
         
         $filtereddata = array_filter($this->deviationdata['timetable'], function ($key) {
             return strpos($key, 'timetable') === 0;
         }, ARRAY_FILTER_USE_KEY);
             $timetableid = null;
             // print_r($filtereddata);
             foreach ($filtereddata as $key=>$value) {
                 $timetablekey = $key;
                 $timetableid = $value;
             }
             
             $connection = ConnectionManager::get('default');
             $ptimes = $connection->execute('SELECT * FROM processing_times')->fetchAll('assoc');
             
             $trainarrdate = $newIncoming['timetablelist'][$timetableid]['Arrival_Date'];
             $trainarrtime = $newIncoming['timetablelist'][$timetableid]['Arrival_Time'];
             
             $wagondescription = $this->deviationdata['timewagon'][1];
             
            
             $wgexists = $connection->execute("SELECT * FROM wagon where Description='".$wagondescription."'")->fetchAll('assoc');
             $a = 0;
             foreach ($wgexists as $value) {
                
                 $a++;
             }
             if ($a == 0) {
                 $message[0] = "Entered deviation is not affecting other yard operation.<br>Wagon {$wagondescription} does not exists!";
                 //return $message;
             } else {
                 $traindistributionparts = 3;
                 $traindistributionpartsaftermailfunction = 5;
                 $num = 28;
                 $additional = 3;
                 //print_r($ptimes);
                 $timefordistributionadd = $ptimes[$traindistributionparts]['duration'] + $ptimes[$additional]['duration'];
                 //print_r($timefordistribution);
                 $message[0] = "Entered deviation is not affecting other yard operation.<br>Wagon {$wagondescription} needs to be pushed to Siding {$num}. Additional processing time {$ptimes[$additional]['duration']} minutes.";
                 
                 }
             return $message;
             
     }
     
    public function getRecommendationsForOtherDeviation($newIncoming,$newSidings=null) {
    
        $devarray = explode(';',$this->deviationdata['otherdeviation']);
        
        //print_r($devarray);
        
        $number = count($devarray);
        
        if (trim($devarray[$number - 1])!="") $nowf = trim($devarray[$number - 1]);
        
        if ($nowf != "")
            $day = date($nowf);
        else
            $day = date('Y-m-d');
                
        $daynumber = strtotime($day);
        
     //   echo $nowf.$day;
        
        
        
        foreach ($newIncoming['timetablelist'] as $key => $value) {
            if ($value['Calculated_Arrival_Date']==$daynumber) {
                $checktrainslist[$key] = $value;
            }
        }
        
        
        $preparedmessages = $this->getPrepraredMessagesForOtherDeviation($checktrainslist,$devarray);
        return $preparedmessages;
    }
    
    public function getPrepraredMessagesForOtherDeviation($checktrainslist,$devarray) {
        
        $number = count($devarray);
        
        $from = $devarray[$number - 3];
        $to = $devarray[$number - 2];
        
        if (trim($devarray[$number - 1])!="") $nowf = trim($devarray[$number - 1]);
        
     //   print_r($devarray);
       // echo $nowf."ssssss";
        
        $connection = ConnectionManager::get('default');
        $ptimes = $connection->execute('SELECT * FROM processing_times')->fetchAll('assoc');
        
        foreach ($ptimes as $key => $value) {
            
            if ($value['id']==1) {
                $duration['proctime'] = $value['duration'];
            }
            
            if ($value['id']==3) {
                $duration['distrtime'] = $value['duration'];
            }
            
        }
        
        $i = 1;
        
       // print_r($checktrainslist);        
        foreach ($checktrainslist as $key=>$value) {
         
            if ($nowf!="") 
                $now = new DateTime(date($nowf));
            else 
                $now = new DateTime(date('Y-m-d'));
            
                
            $now->modify("+{$to} hours");
            
            $dateTimeTo = $now;
            $dateTimeToStr = $now->format('Y-m-d H:i:s');
            
            // $now = new DateTime(date('Y-m-d'));
            if ($nowf!="")
                $now = new DateTime(date($nowf));
            else
                $now = new DateTime(date('Y-m-d'));
                    
         //   echo $now."1";
            $now->modify("+{$from} hours");
            
            $dateTimeFrom = $now;
            $dateTimeFormStr = $now->format('Y-m-d H:i:s');
            
            //$dateTimecheck = $dateTimeTo;
            
           // echo $value["Dispatch_Date"]." ".$value['Dispatch_Time']." ".$dateTimecheck->format('Y-m-d H:i:s')."<br>";
            
           // echo $value['Calculated_Dispatch_Time']." ".strtotime($dateTimecheck->format('Y-m-d H:i:s'))."<br>";
            
            //$dateTimecheck->modify("-{$duration['proctime']} minutes");
            
            if  ($value['Calculated_Dispatch_Time'] > strtotime($dateTimeTo->format('Y-m-d H:i:s'))) {
                //    echo $value['Dispatch_Time']." 1";
                $dateTime = new DateTime(date('Y-m-d H:i:s',$value['Calculated_Dispatch_Time']));
               //echo $dateTime->format('Y-m-d H:i:s');
                $dateTime->modify("-{$duration['proctime']} minutes");
                $Starttime = $dateTime;
                $starttime = $dateTime->format('H:i');
                $dateTime = new DateTime(date('Y-m-d H:i:s',$value['Calculated_Dispatch_Time']));
                //echo $dateTime->format('Y-m-d H:i');
                $Endtime = $dateTime;
                $endtime = $dateTime->format('H:i');
            } else if ($value['Calculated_Dispatch_Time'] < strtotime($dateTimeTo->format('Y-m-d H:i:s')) &&
                $value['Dispatch_Time']!='00:00:00'){
                //    echo $value['Dispatch_Time']." 2";
                $Starttime = $dateTimeTo;
                $starttime = $Starttime->format('H:i');
                $dateTime = new DateTime(date('Y-m-d H:i:s',strtotime($dateTimeTo->format('Y-m-d H:i:s'))));
                $add = $duration['proctime'] ;
                $dateTime->modify("+{$add} minutes");
                $EndTime = $dateTime;
                $endtime = $dateTime->format('H:i');
           } else {
                 // echo $value['Dispatch_Time']." 3";
                $Starttime = $dateTimeTo;
                $starttime = $Starttime->format('H:i');
                $dateTime = new DateTime(date('Y-m-d H:i:s',strtotime($dateTimeTo->format('Y-m-d H:i:s'))));
                $add = $duration['proctime'] + $duration['distrtime'];
                $dateTime->modify("+{$add} minutes");
                $EndTime = $dateTime;
                $endtime = $dateTime->format('H:i');
                
            }
            
            //echo $starttime."   ".$endtime."<br>";
            
           
            $message ="Train {$value['Train_Number']} is going to be processed from {$starttime} until {$endtime}.";
            
            $messageone = '';
            $messagesecond= '';
            $RealStartTime = $Starttime;
            $RealEndTime = $EndTime;
            
            foreach ($checktrainslist as $keyother=>$valueother) {
                
                if ((string)$key === (string)$keyother) continue;
               
                $dateTimeOther = $EndTime;
                $add = $this->addtime;
                $dateTimeOther->modify("+{$add} minutes");
                $Secondtime = $dateTimeOther;
                $secondtime = $dateTimeOther->format('H:i');
                
                $dateTimeOther = $Secondtime;
                $add = $duration['proctime'] + $duration['distrtime'];
                $dateTimeOther->modify("+{$add} minutes");
                $SecondtimeEnd = $dateTimeOther;
                $secondtimeend = $dateTimeOther->format('H:i');
                
               
                
                
                $messageone.="Train {$valueother['Train_Number']} is going to be processed from {$secondtime} until {$secondtimeend}.
                                It can leave yard at {$secondtimeend}.";
                
                $dateTimeOther = null;
            }
            if ($messageone != "")
            $messages[$i++] = $message.$messageone;
           
            
            $Starttime = $RealStartTime ;
            $EndTime = $RealEndTime;
            $Secondtime = null;
            $SecondtimeEnd = null;
            $dateTimeOther = null;
            
            $checklistreverse = array_reverse($checktrainslist, true);
            foreach ($checklistreverse  as $keyother=>$valueother) {
                
                if ((string)$key === (string)$keyother) continue;
                
                $dateTimeOther = $EndTime;
                $add = 10;
                $dateTimeOther->modify("+{$add} minutes");
                $Secondtime = $dateTimeOther;
                $secondtime = $dateTimeOther->format('H:i');
                
                $dateTimeOther = $Secondtime;
                $add = $duration['proctime'] + $duration['distrtime'];
                $dateTimeOther->modify("+{$add} minutes");
                $SecondtimeEnd = $dateTimeOther;
                $secondtimeend = $dateTimeOther->format('H:i');
                
                               
                
                $messagesecond.="Train {$valueother['Train_Number']} is going to be processed from {$secondtime} until {$secondtimeend}.
                                It can leave yard at {$secondtimeend}.";
                
                $dateTimeOther = null;
            }
            if ($messagesecond != "") {
                
                $messages[$i++] = $message.$messagesecond;
            }
               
        }
        $messageone= "";
        $messagesecond="";
        
        return $messages;
        
    }
    
    public function getRecommendations($newIncoming,$newSidings=null) {
        
        $filtereddata = array_filter($this->deviationdata['timetable'], function ($key) {
            return strpos($key, 'timetable') === 0;
        }, ARRAY_FILTER_USE_KEY);
            $timetableid = null;
            // print_r($filtereddata);
            foreach ($filtereddata as $key=>$value) {
                $timetablekey = $key;
                $timetableid = $value;
            }
        
            $connection = ConnectionManager::get('default');
            $ptimes = $connection->execute('SELECT * FROM processing_times')->fetchAll('assoc');
            
            $trainarrdate = $newIncoming['timetablelist'][$timetableid]['Arrival_Date'];
            $trainarrtime = $newIncoming['timetablelist'][$timetableid]['Arrival_Time'];
                    
            
            foreach ($ptimes as $key => $value) { 
                
                if ($value['id']==1) {
                    $duration['proctime'] = $value['duration']; 
                }
                
                if ($value['id']==3) {
                    $duration['distrtime'] = $value['duration'];
                }
                
            }
            
            $trainlate = $this->deviationdata['timewagon'][1] + $duration['proctime'] + $duration['distrtime'];
            
            $timemilifortrain=strtotime($trainarrdate.' '.$trainarrtime);
            
            $dateTime = new DateTime(date('Y-m-d H:i:s',$timemilifortrain));
            
            $dateTime->modify("+{$trainlate} minutes");
           
            $calculatedlatetime = strtotime($dateTime->format('Y-m-d H:i:s'));
            
            foreach ($newIncoming['timetablelist'] as $key => $value) {
                
                if ($value['Calculated_Arrival_Time']<$timemilifortrain) {
                    $checktrainslist[$key] = $value;
                }
            }
            
           $dtlatetrain = $dateTime->format('Y-m-d');
            
           
           $duration['calclatetime'] = $calculatedlatetime;
           
           
            //echo $calculatedlatetime."_<br>";
            //print_r($checktrainslist);
            foreach ($checktrainslist as $key => $value) {
                
                $dateTime = new DateTime(date('Y-m-d H:i:s',$value['Calculated_Dispatch_Time']));
                $dateTime->modify("-{$duration['distrtime']} minutes");
                $calculateddispatchtime = strtotime($dateTime->format('Y-m-d H:i:s'));
                
                //echo $calculateddispatchtime."<br>";
                
                
                if ($calculateddispatchtime > $calculatedlatetime) {
                    $noinfluencedtrains[$key] = $value;
                    
                } else if ($calculateddispatchtime < $calculatedlatetime) {
                    
                    $dtcalc = $dateTime->format('Y-m-d');
                    // proveravamo u istom danu
                    if ($dtlatetrain == $dtcalc) {
                        $influencedtrains[$key] = $value;
                    }
                } 
                
            }
            
            if (count($influencedtrains) == 1) {
                foreach ($influencedtrains as $value)
                    $influencedtrain = $value;
                $preparedmessages = $this->preparemessagesforcaseone($timetableid, $duration,$influencedtrain,$newIncoming['timetablelist'][$timetableid]);
            } else if (count($influencedtrains) > 1) {
                $preparedmessages = $this->preparemessagesforother($timetableid, $duration,$influencedtrains,$newIncoming['timetablelist'][$timetableid]);
            } else {
                $preparedmessages[0] = "Entered deviation is not affecting other yard operation";
            }
            
            return $preparedmessages;
            
            
    }
    
    
    public function preparemessagesforcaseone($timetableid, $duration, $troubletrain, $latetrain) {
        
        $dateTime = new DateTime(date('Y-m-d H:i:s',$duration['calclatetime']));
        $option1_late_train_time = $dateTime->format('H:i');
        $option1_proc_time=$duration['proctime'];
        $dateTime->modify("+{$duration['proctime']} minutes");
        $option1_leave_time = $dateTime->format('H:i');
        $dateTime->modify("+10 minutes");
        $option1_leave_time_width_ten = $dateTime->format('H:i');
        
        $dateTime = new DateTime(date('Y-m-d H:i:s',$troubletrain['Calculated_Dispatch_Time']));
        //echo $dateTime->format('Y-m-d H:i');
        $option2_processing_to = $dateTime->format('H:i');
        $dateTime->modify("+10 minutes");
        $option2_processing_late_from = $dateTime->format('H:i');
        $add = $duration['proctime'] + $duration['distrtime'];
        $dateTime->modify("+{$add} minutes");
        $option2_processing_late_from_finished = $dateTime->format('H:i');
        $dateTime->modify("+10 minutes");
        $option2_processing_late_from_start = $dateTime->format('H:i');
        $dateTime = new DateTime(date('Y-m-d H:i:s',$troubletrain['Calculated_Dispatch_Time']));
        $dateTime->modify("-{$duration['proctime']} minutes");
        $dateTime->modify("-10 minutes");
        $option2_processing_from = $dateTime->format('H:i');
        
        
        
        
        $messages[0] = "Option 1: If train {$latetrain['Train_Number']} is going to be processed first, 
                   it means that processing and shunting of train {$troubletrain['Train_Number']} 
                   can start at {$option1_late_train_time} and it can leave station with {$option1_proc_time} minutes delay and leave the yard at {$option1_leave_time}.
                   This mean that workers and shunting locomotive for next operation can start at {$option1_leave_time_width_ten}.";
        $messages[1] = "Option 2: If train {$troubletrain['Train_Number']} is going to leave station according to the plan, 
                        processing will be from {$option2_processing_from} until {$option2_processing_to} and processing for 
                        train {$latetrain['timetablelist'][$timetableid]['Train_Number']} can start at {$option2_processing_late_from} and will be finished at {$option2_processing_late_from_finished}.
                        This means that workers and shunting locomotive for next operation can start at {$option2_processing_late_from_start}.";
        
        return $messages;
    }
    
    public function preparemessagesforother($timetableid, $duration, $troubletrains, $latetrain) {
        $i = 0;
        foreach ($troubletrains as $key=>$value) {
            
            $dateTime = new DateTime(date('Y-m-d H:i:s',$duration['calclatetime']));
            $option1_late_train_time = $dateTime->format('H:i');
            $option1_proc_time=$duration['proctime'];
            $dateTime->modify("+{$duration['proctime']} minutes");
            $option1_leave_time = $dateTime->format('H:i');
            $dateTime->modify("+10 minutes");
            $option1_leave_time_width_ten = $dateTime->format('H:i');
            
            $dateTime = new DateTime(date('Y-m-d H:i:s',$value['Calculated_Dispatch_Time']));
            //echo $dateTime->format('Y-m-d H:i');
            $option2_processing_to = $dateTime->format('H:i');
            $dateTime->modify("+10 minutes");
            $option2_processing_late_from = $dateTime->format('H:i');
            $add = $duration['proctime'] + $duration['distrtime'];
            $dateTime->modify("+{$add} minutes");
            $option2_processing_late_from_finished = $dateTime->format('H:i');
            $dateTime->modify("+10 minutes");
            $option2_processing_late_from_start = $dateTime->format('H:i');
            $dateTime = new DateTime(date('Y-m-d H:i:s',$value['Calculated_Dispatch_Time']));
            $dateTime->modify("-{$duration['proctime']} minutes");
            $dateTime->modify("-10 minutes");
            $option2_processing_from = $dateTime->format('H:i');
            
            $messages[$i++]="Option {$i}:
            If train {$latetrain['Train_Number']} is going to be processed first this means that processing of train {$latetrain['Train_Number']} 
                can start at {$option1_late_train_time} until {$option1_proc_time} and processing of train {$value['Train_Number']} can start at {$option2_processing_late_from} until {$option2_processing_late_from_finished}.
                This mean that workers and shunting locomotive for next operation can start at {$option2_processing_late_from_start}.";
            $messages[$i++] = "Option {$i}: If train {$value['Train_Number']} is going to be processed first according to the plan,
                processing will be from {$option2_processing_from} until until {$option2_processing_to} and processing with
                    shunting operations for train {$latetrain['Train_Number']} can start at {$option2_processing_late_from} and will be finished at {$option2_processing_late_from_finished}.
                        This means that workers and shunting locomotive for next operation can start at {$option2_processing_late_from_start}.";
            
            
        }
        
        
        return $messages;
        
           
    }
    
    
    
}
