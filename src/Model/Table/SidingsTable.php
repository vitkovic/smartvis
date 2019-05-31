<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sidings Model
 *
 * @method \App\Model\Entity\Siding get($primaryKey, $options = [])
 * @method \App\Model\Entity\Siding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Siding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Siding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Siding saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Siding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Siding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Siding findOrCreate($search, callable $callback = null, $options = [])
 */
class SidingsTable extends Table
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

        $this->setTable('sidings');
        $this->setDisplayField('IDsidings');
        $this->setPrimaryKey('IDsidings');
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
            ->integer('IDsidings')
            ->allowEmptyString('IDsidings', 'create');

        $validator
            ->integer('Siding_purpose')
            ->allowEmptyString('Siding_purpose');

        $validator
            ->numeric('Siding_lenght')
            ->allowEmptyString('Siding_lenght');

        $validator
            ->numeric('Mass_per_axle')
            ->allowEmptyString('Mass_per_axle');

        $validator
            ->integer('Siding_Type')
            ->allowEmptyString('Siding_Type');

        $validator
            ->integer('IDSGroup')
            ->requirePresence('IDSGroup', 'create')
            ->allowEmptyString('IDSGroup', false);

        return $validator;
    }
}