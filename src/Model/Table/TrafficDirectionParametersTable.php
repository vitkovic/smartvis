<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrafficDirectionParameters Model
 *
 * @method \App\Model\Entity\TrafficDirectionParameter get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirectionParameter findOrCreate($search, callable $callback = null, $options = [])
 */
class TrafficDirectionParametersTable extends Table
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

        $this->setTable('traffic_direction_parameters');
        $this->setDisplayField('IDTDP');
        $this->setPrimaryKey('IDTDP');
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
            ->integer('IDTDP')
            ->allowEmptyString('IDTDP', 'create');

        $validator
            ->integer('Locomotive_Type')
            ->requirePresence('Locomotive_Type', 'create')
            ->allowEmptyString('Locomotive_Type', false);

        $validator
            ->integer('Limitations')
            ->requirePresence('Limitations', 'create')
            ->allowEmptyString('Limitations', false);

        $validator
            ->numeric('Maximum_Train_Length')
            ->requirePresence('Maximum_Train_Length', 'create')
            ->allowEmptyString('Maximum_Train_Length', false);

        return $validator;
    }
}
