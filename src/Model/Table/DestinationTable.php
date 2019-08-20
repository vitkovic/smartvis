<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Destination Model
 *
 * @property \App\Model\Table\SidingsTable|\Cake\ORM\Association\HasMany $Sidings
 * @property \App\Model\Table\WagonTable|\Cake\ORM\Association\HasMany $Wagon
 *
 * @method \App\Model\Entity\Destination get($primaryKey, $options = [])
 * @method \App\Model\Entity\Destination newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Destination[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Destination|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destination saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Destination[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Destination findOrCreate($search, callable $callback = null, $options = [])
 */
class DestinationTable extends Table
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

        $this->setTable('destination');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Sidings', [
            'foreignKey' => 'destination_id'
        ]);
        $this->hasMany('Wagon', [
            'foreignKey' => 'destination_id'
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

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
