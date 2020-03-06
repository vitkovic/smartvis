<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sidings Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Destination
 * @property |\Cake\ORM\Association\HasMany $TrainHasSiding
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

        $this->belongsTo('Destination', [
            'foreignKey' => 'destination_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TrainHasSiding', [
            'foreignKey' => 'siding_id'
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
            ->integer('IDsidings')
            ->allowEmptyString('IDsidings', 'create');

        $validator
            ->scalar('Siding_purpose')
            ->maxLength('Siding_purpose', 50)
            ->allowEmptyString('Siding_purpose');

        $validator
            ->numeric('Siding_lenght')
            ->allowEmptyString('Siding_lenght');

        $validator
            ->scalar('Mass_per_axle')
            ->maxLength('Mass_per_axle', 30)
            ->allowEmptyString('Mass_per_axle');

        $validator
            ->scalar('Siding_Type')
            ->maxLength('Siding_Type', 50)
            ->allowEmptyString('Siding_Type');

        $validator
            ->integer('IDSGroup')
            ->requirePresence('IDSGroup', 'create')
            ->allowEmptyString('IDSGroup', false);

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
        $rules->add($rules->existsIn(['destination_id'], 'Destination'));

        return $rules;
    }
}
