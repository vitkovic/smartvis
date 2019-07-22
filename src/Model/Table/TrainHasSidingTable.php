<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainHasSiding Model
 *
 * @property \App\Model\Table\TrainsTable|\Cake\ORM\Association\BelongsTo $Trains
 * @property \App\Model\Table\SidingsTable|\Cake\ORM\Association\BelongsTo $Sidings
 *
 * @method \App\Model\Entity\TrainHasSiding get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainHasSiding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainHasSiding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasSiding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainHasSiding saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainHasSiding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasSiding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasSiding findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainHasSidingTable extends Table
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

        $this->setTable('train_has_siding');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Train', [
            'foreignKey' => 'train_id'
           
        ]);
        $this->belongsTo('Sidings', [
            'foreignKey' => 'siding_id'
            
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['train_id'], 'Train'));
        $rules->add($rules->existsIn(['siding_id'], 'Sidings'));

        return $rules;
    }
}
