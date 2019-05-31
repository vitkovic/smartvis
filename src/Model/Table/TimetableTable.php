<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timetable Model
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
            ->integer('ID_Sidings')
            ->requirePresence('ID_Sidings', 'create')
            ->allowEmptyString('ID_Sidings', false);

        $validator
            ->integer('IDS_Group')
            ->requirePresence('IDS_Group', 'create')
            ->allowEmptyString('IDS_Group', false);

        $validator
            ->integer('Siding_Purpose')
            ->allowEmptyString('Siding_Purpose');

        $validator
            ->numeric('Siding_Lenght')
            ->allowEmptyString('Siding_Lenght');

        $validator
            ->numeric('Mass_per_Axle')
            ->allowEmptyString('Mass_per_Axle');

        $validator
            ->integer('Siding_Type')
            ->allowEmptyString('Siding_Type');

        $validator
            ->integer('ID_Timetable')
            ->allowEmptyString('ID_Timetable', 'create');

        return $validator;
    }
}
