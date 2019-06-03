<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drawing Model
 *
 * @property \App\Model\Table\SidingsTable|\Cake\ORM\Association\BelongsTo $Sidings
 * @property \App\Model\Table\WagonsTable|\Cake\ORM\Association\BelongsTo $Wagons
 *
 * @method \App\Model\Entity\Drawing get($primaryKey, $options = [])
 * @method \App\Model\Entity\Drawing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Drawing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Drawing|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drawing saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drawing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Drawing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Drawing findOrCreate($search, callable $callback = null, $options = [])
 */
class DrawingTable extends Table
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

        $this->setTable('drawing');
        $this->setDisplayField('id_draw');
        $this->setPrimaryKey('id_draw');

        $this->belongsTo('Sidings', [
            'foreignKey' => 'sidings_id'
        ]);
        $this->belongsTo('Wagons', [
            'foreignKey' => 'wagon_id'
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
            ->integer('id_draw')
            ->allowEmptyString('id_draw', 'create');

        $validator
            ->scalar('graphics')
            ->maxLength('graphics', 4294967295)
            ->allowEmptyString('graphics');

        $validator
            ->scalar('note')
            ->maxLength('note', 4294967295)
            ->allowEmptyString('note');

        $validator
            ->scalar('sidings_g_m')
            ->maxLength('sidings_g_m', 255)
            ->requirePresence('sidings_g_m', 'create')
            ->allowEmptyString('sidings_g_m', false);

        $validator
            ->scalar('wagon_g_m')
            ->maxLength('wagon_g_m', 255)
            ->requirePresence('wagon_g_m', 'create')
            ->allowEmptyString('wagon_g_m', false);

        $validator
            ->scalar('other_graphics')
            ->maxLength('other_graphics', 100)
            ->allowEmptyString('other_graphics');

        $validator
            ->integer('showgraphics')
            ->allowEmptyString('showgraphics');

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
        $rules->add($rules->existsIn(['sidings_id'], 'Sidings'));
        $rules->add($rules->existsIn(['wagon_id'], 'Wagons'));

        return $rules;
    }
}
