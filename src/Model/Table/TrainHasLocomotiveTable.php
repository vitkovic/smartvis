<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainHasLocomotive Model
 *
 * @property \App\Model\Table\LocomotivesTable|\Cake\ORM\Association\BelongsTo $Locomotives
 * @property \App\Model\Table\TrainsTable|\Cake\ORM\Association\BelongsTo $Trains
 *
 * @method \App\Model\Entity\TrainHasLocomotive get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainHasLocomotive findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainHasLocomotiveTable extends Table
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

        $this->setTable('train_has_locomotive');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locomotive', [
            'foreignKey' => 'locomotive_id'
            
        ]);
        $this->belongsTo('Train', [
            'foreignKey' => 'train_id'
            
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
            ->maxLength('description', 100)
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
        $rules->add($rules->existsIn(['locomotive_id'], 'Locomotive'));
        $rules->add($rules->existsIn(['train_id'], 'Train'));

        return $rules;
    }
}
