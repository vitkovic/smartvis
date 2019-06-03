<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrafficDirection Model
 *
 * @method \App\Model\Entity\TrafficDirection get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrafficDirection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrafficDirection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrafficDirection saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrafficDirection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrafficDirection findOrCreate($search, callable $callback = null, $options = [])
 */
class TrafficDirectionTable extends Table
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

        $this->setTable('traffic_direction');
        $this->setDisplayField('ID_Traffic_Direction');
        $this->setPrimaryKey('ID_Traffic_Direction');
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
            ->integer('ID_Traffic_Direction')
            ->allowEmptyString('ID_Traffic_Direction', 'create');

        $validator
            ->scalar('Mass_Per_Axle')
            ->maxLength('Mass_Per_Axle', 50)
            ->allowEmptyString('Mass_Per_Axle');

        $validator
            ->scalar('Traffic_Direction')
            ->maxLength('Traffic_Direction', 50)
            ->allowEmptyString('Traffic_Direction');

        return $validator;
    }
}
