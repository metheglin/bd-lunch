<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\BelongsToMany $Tasks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Utils.WhoDidIt');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsToMany('Tasks', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'tasks_users'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('backlogid');

        $validator
            ->allowEmpty('chatworkid');

        $validator
            ->boolean('isactive')
            ->allowEmpty('isactive');

        $validator
            ->boolean('isdel')
            ->allowEmpty('isdel');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

/**    
* GetOption Method For dropdown list
* By Tarikul Islam (www.tarikul.com)
* 
* @param void 
* @return list as array
*/
    public function getSelectOptions($status=NULL){
        $options = [
            'conditions' =>[
                'Users.isdel IS NULL',
                'Users.isactive'=>true,
            ],
            'order' => [],
            'contain'=>[],
        ];
        if (!empty($status)) {
            $options['conditions']['status'] = $status;
        }
        $results=$this->find('all',$options)->all()->toArray();
        $newData = [];
        foreach ($results as $key => $value) {
            $newData[$key]['text'] = $value['name'];
            $newData[$key]['value'] = $value['id'];
        }
        return $newData;
    }
}
