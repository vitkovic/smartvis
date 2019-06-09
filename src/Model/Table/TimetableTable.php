<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timetable Model
 *
 * @property \App\Model\Table\TrainTable|\Cake\ORM\Association\BelongsTo $Train
 *
 * @method \App\Model\Entity\Timetable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Timetable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Timetable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Timetable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timetable saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timetable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Timetable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Timetable findOrCreate($search, callable $callback = null, $options = [])
 */
class TimetableTable extends Table
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

        $this->setTable('timetable');
        $this->setDisplayField('ID_Timetable');
        $this->setPrimaryKey('ID_Timetable');

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
            ->scalar('Source')
            ->maxLength('Source', 100)
            ->allowEmptyString('Source');

        $validator
            ->scalar('Destination')
            ->maxLength('Destination', 100)
            ->requirePresence('Destination', 'create')
            ->allowEmptyString('Destination', false);

        $validator
            ->date('Arrival_Date')
            ->allowEmptyDate('Arrival_Date');

        $validator
            ->date('Dispatch_Date')
            ->allowEmptyDate('Dispatch_Date');

        $validator
            ->time('Arrival_Time')
            ->allowEmptyTime('Arrival_Time');

        $validator
            ->time('Dispatch_Time')
            ->allowEmptyTime('Dispatch_Time');

        $validator
            ->integer('ID_Timetable')
            ->allowEmptyString('ID_Timetable', 'create');

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
        $rules->add($rules->existsIn(['Train_id'], 'Train'));

        return $rules;
    }
}
