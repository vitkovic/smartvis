<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserSmart Model
 *
 * @method \App\Model\Entity\UserSmart get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserSmart newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserSmart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserSmart|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserSmart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserSmart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserSmart[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserSmart findOrCreate($search, callable $callback = null, $options = [])
 */
class UserSmartTable extends Table
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

        $this->setTable('user_smart');
        $this->setDisplayField('ID_User');
        $this->setPrimaryKey('ID_User');
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
            ->integer('Phone')
            ->allowEmptyString('Phone');

        $validator
            ->integer('Role')
            ->allowEmptyString('Role');

        $validator
            ->integer('Type')
            ->allowEmptyString('Type');

        $validator
            ->integer('First_Name')
            ->allowEmptyString('First_Name');

        $validator
            ->integer('Last_Name')
            ->allowEmptyString('Last_Name');

        $validator
            ->integer('Email')
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
