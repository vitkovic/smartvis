<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inputwagons Model
 *
 * @property \App\Model\Table\TimetableTable|\Cake\ORM\Association\BelongsTo $Timetable
 *
 * @method \App\Model\Entity\Inputwagon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inputwagon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inputwagon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inputwagon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inputwagon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inputwagon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inputwagon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inputwagon findOrCreate($search, callable $callback = null, $options = [])
 */
class InputwagonsTable extends Table
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

        $this->setTable('inputwagons');
        $this->setDisplayField('Temp_Id');
        $this->setPrimaryKey('Temp_Id');

        $this->belongsTo('Timetable', [
            'foreignKey' => 'Timetable_id',
            'joinType' => 'INNER'
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
            ->integer('Temp_Id')
            ->allowEmptyString('Temp_Id', 'create');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 100)
            ->requirePresence('Description', 'create')
            ->allowEmptyString('Description', false);

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
        $rules->add($rules->existsIn(['Timetable_id'], 'Timetable'));

        return $rules;
    }
}
