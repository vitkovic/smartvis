<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WagonHasTrain Model
 *
 * @property \App\Model\Table\WagonsTable|\Cake\ORM\Association\BelongsTo $Wagons
 * @property \App\Model\Table\TrainsTable|\Cake\ORM\Association\BelongsTo $Trains
 *
 * @method \App\Model\Entity\WagonHasTrain get($primaryKey, $options = [])
 * @method \App\Model\Entity\WagonHasTrain newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WagonHasTrain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasTrain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WagonHasTrain saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WagonHasTrain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasTrain[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WagonHasTrain findOrCreate($search, callable $callback = null, $options = [])
 */
class WagonHasTrainTable extends Table
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

        $this->setTable('wagon_has_train');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Wagon', [
            'foreignKey' => 'Wagon_id'
       ]);
        $this->belongsTo('Train', [
            'foreignKey' => 'Train_id'
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
        $rules->add($rules->existsIn(['Wagon_id'], 'Wagon'));
        $rules->add($rules->existsIn(['Train_id'], 'Train'));

        return $rules;
    }
}
