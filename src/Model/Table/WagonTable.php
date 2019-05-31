<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wagon Model
 *
 * @method \App\Model\Entity\Wagon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wagon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wagon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wagon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wagon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wagon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wagon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wagon findOrCreate($search, callable $callback = null, $options = [])
 */
class WagonTable extends Table
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

        $this->setTable('wagon');
        $this->setDisplayField('ID_wagon');
        $this->setPrimaryKey('ID_wagon');
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
            ->allowEmptyString('ID_wagon', 'create');

        $validator
            ->integer('NumberWagonAxles')
            ->allowEmptyString('NumberWagonAxles');

        $validator
            ->numeric('NetMassCargo')
            ->allowEmptyString('NetMassCargo');

        $validator
            ->integer('Type')
            ->allowEmptyString('Type');

        $validator
            ->numeric('WagonLenght')
            ->allowEmptyString('WagonLenght');

        $validator
            ->numeric('WagonMass')
            ->allowEmptyString('WagonMass');

        $validator
            ->numeric('BrakeWeight')
            ->allowEmptyString('BrakeWeight');

        $validator
            ->integer('TypeofCargo')
            ->allowEmptyString('TypeofCargo');

        return $validator;
    }
}
