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
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class YardController extends AppController
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
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
        $this->set('setvisibility',$this->setvisibility);
        $this->Auth->allow(['index', 'view', 'display']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function viewyard()
    {
      //  $connection = ConnectionManager::get('default');
      //  $wagons = $connection->execute('SELECT COUNT(id_Wagon) FROM wagon')->fetch();
        
        
        $wagons = TableRegistry::getTableLocator()->get('Wagon');
        $numw = $wagons->find()->count();
        $this->set('wagonsnum',$numw);
        
        
        $wagonserror = $wagons->find('all')
        ->where(['Wagon.Remark =' => 'M'])->count();
        $this->set('wagonserror',$wagonserror);
        
        $locomotives = TableRegistry::getTableLocator()->get('Locomotive');
        $loc = $locomotives->find('all')->count();
        $this->set('loc',$loc);
        
        $operators = TableRegistry::getTableLocator()->get('People');
        $opfun = $operators->find('all')->where(['People.Role' => 6])->count();
        $this->set('opfun',$opfun);
        
        $operators = TableRegistry::getTableLocator()->get('People');
        $opwp = $operators->find('all')->where(['People.Role' => 6, 'People.Type =' => '1'])->count();
        $this->set('opwp',$opwp);
        
    }
    public function viewyardsimplified()
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
   
        
        
    
}
