<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * People Model
 *
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, callable $callback = null, $options = [])
 */
class PeopleTable extends Table
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

        $this->setTable('people');
        $this->setDisplayField('username');
        $this->setPrimaryKey('ID_User');
        
        $this->belongsTo('Roles', [
            'foreignKey' => 'Role',
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
            ->integer('ID_User')
            ->allowEmptyString('ID_User', 'create');

        $validator
            ->scalar('Phone')
            ->maxLength('Phone', 50)
            ->allowEmptyString('Phone');

        $validator
            ->integer('Role')
            ->requirePresence('Role', 'create')
            ->allowEmptyString('Role', false);

        $validator
            ->scalar('Type')
            ->maxLength('Type', 11)
            ->allowEmptyString('Type');

        $validator
            ->scalar('First_Name')
            ->maxLength('First_Name', 30)
            ->allowEmptyString('First_Name');

        $validator
            ->scalar('Last_Name')
            ->maxLength('Last_Name', 50)
            ->allowEmptyString('Last_Name');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 30)
            ->allowEmptyString('Email');

        $validator
            ->scalar('username')
            ->maxLength('username', 20)
            ->allowEmptyString('username');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
