<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wagon Model
 *
 * @property \App\Model\Table\DestinationTable|\Cake\ORM\Association\BelongsTo $Destination
 * @property \App\Model\Table\DestinationTable|\Cake\ORM\Association\BelongsTo $Destination
 * @property \App\Model\Table\PeopleTable|\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\DrawingTable|\Cake\ORM\Association\HasMany $Drawing
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

        $this->belongsTo('Destination', [
            'foreignKey' => 'destination_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Destination', [
            'foreignKey' => 'arrival_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Drawing', [
            'foreignKey' => 'wagon_id'
        ]);
        
        $this->belongsToMany('Train', [
            'through' => 'WagonHasTrain',
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
            ->integer('ID_wagon')
            ->allowEmptyString('ID_wagon', 'create');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 50)
            ->requirePresence('Description', 'create')
            ->allowEmptyString('Description', false);

        $validator
            ->numeric('Net_Mass_Cargo')
            ->allowEmptyString('Net_Mass_Cargo');

        $validator
            ->scalar('Type')
            ->maxLength('Type', 10)
            ->allowEmptyString('Type');

        $validator
            ->numeric('Wagon_Lenght')
            ->allowEmptyString('Wagon_Lenght', false);

        $validator
            ->numeric('Wagon_Mass')
            ->allowEmptyString('Wagon_Mass');

        $validator
            ->numeric('Brake_Weight')
            ->allowEmptyString('Brake_Weight', false);

        $validator
            ->scalar('Type_of_Cargo')
            ->maxLength('Type_of_Cargo', 30)
            ->allowEmptyString('Type_of_Cargo');

        $validator
            ->integer('Number_of_Axles')
            ->allowEmptyString('Number_of_Axles');

        $validator
            ->scalar('Destination_station')
            ->maxLength('Destination_station', 45)
            ->allowEmptyString('Destination_station');

        $validator
            ->scalar('Arrival_station')
            ->maxLength('Arrival_station', 45)
            ->allowEmptyString('Arrival_station');

        $validator
            ->scalar('Remark')
            ->maxLength('Remark', 45)
            ->allowEmptyString('Remark');

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
        $rules->add($rules->existsIn(['arrival_id'], 'Destination'));
        $rules->add($rules->existsIn(['people_id'], 'People'));

        return $rules;
    }
}
