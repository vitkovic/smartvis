<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Train Model
 *
 * @method \App\Model\Entity\Train get($primaryKey, $options = [])
 * @method \App\Model\Entity\Train newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Train[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Train|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Train saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Train patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Train[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Train findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('train');
        $this->setDisplayField('ID_Train');
        $this->setPrimaryKey('ID_Train');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->numeric('Train_Weight_per_Axle')
            ->requirePresence('Train_Weight_per_Axle', 'create')
            ->allowEmptyString('Train_Weight_per_Axle', false);

        $validator
            ->integer('Train_Composition')
            ->allowEmptyString('Train_Composition');

        $validator
            ->integer('ID_Train')
            ->allowEmptyString('ID_Train', 'create');

        $validator
            ->scalar('Train_type')
            ->maxLength('Train_type', 50)
            ->allowEmptyString('Train_type');

        $validator
            ->scalar('Train_Number')
            ->maxLength('Train_Number', 50)
            ->allowEmptyString('Train_Number');

        $validator
            ->date('Dispatch_Time_Starting')
            ->allowEmptyDate('Dispatch_Time_Starting');

        $validator
            ->numeric('Train_Mass_In_Tones')
            ->allowEmptyString('Train_Mass_In_Tones');

        $validator
            ->numeric('Train_Lenght_In_Meters')
            ->allowEmptyString('Train_Lenght_In_Meters');

        $validator
            ->integer('In_Out_Train')
            ->allowEmptyString('In_Out_Train');

        return $validator;
    }
}
