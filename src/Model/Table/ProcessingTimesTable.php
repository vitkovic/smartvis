<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProcessingTimes Model
 *
 * @method \App\Model\Entity\ProcessingTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProcessingTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProcessingTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProcessingTime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcessingTime saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcessingTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProcessingTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProcessingTime findOrCreate($search, callable $callback = null, $options = [])
 */
class ProcessingTimesTable extends Table
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

        $this->setTable('processing_times');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('operation')
            ->maxLength('operation', 255)
            ->requirePresence('operation', 'create')
            ->allowEmptyString('operation', false);

        $validator
            ->numeric('duration')
            ->requirePresence('duration', 'create')
            ->allowEmptyString('duration', false);

        return $validator;
    }
}
