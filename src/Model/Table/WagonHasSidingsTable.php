<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WagonHasSidings Model
 *
 * @method \App\Model\Entity\WagonHasSiding get($primaryKey, $options = [])
 * @method \App\Model\Entity\WagonHasSiding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WagonHasSiding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasSiding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WagonHasSiding saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WagonHasSiding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasSiding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasSiding findOrCreate($search, callable $callback = null, $options = [])
 */
class WagonHasSidingsTable extends Table
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

        $this->setTable('wagon_has_sidings');
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
            ->integer('ID_wagon')
            ->requirePresence('ID_wagon', 'create')
            ->allowEmptyString('ID_wagon', false);

        $validator
            ->integer('ID_sidings')
            ->allowEmptyString('ID_sidings');

        $validator
            ->scalar('label')
            ->maxLength('label', 30)
            ->requirePresence('label', 'create')
            ->allowEmptyString('label', false);

        $validator
            ->integer('position')
            ->allowEmptyString('position');

        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        return $validator;
    }
}
