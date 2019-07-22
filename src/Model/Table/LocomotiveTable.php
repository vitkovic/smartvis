<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locomotive Model
 *
 * @property \App\Model\Table\TrainHasLocomotiveTable|\Cake\ORM\Association\HasMany $TrainHasLocomotive
 *
 * @method \App\Model\Entity\Locomotive get($primaryKey, $options = [])
 * @method \App\Model\Entity\Locomotive newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Locomotive[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Locomotive|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locomotive saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locomotive patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Locomotive[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Locomotive findOrCreate($search, callable $callback = null, $options = [])
 */
class LocomotiveTable extends Table
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

        $this->setTable('locomotive');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TrainHasLocomotive', [
            'foreignKey' => 'locomotive_id'
        ]);
        
        $this->belongsToMany('Train', [
            'through' => 'TrainHasLocomotive',
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
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        return $validator;
    }
}
