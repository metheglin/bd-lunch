<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 *
 * @property \App\Model\Table\MediaRequestsTable|\Cake\ORM\Association\BelongsTo $MediaRequests
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TasksTable extends Table
{
    #public $optionAlias = ['appid'=>'Create Appid', 'create_ci'=>'Create CI','apikey_server'=>'Create Server Apikey', 'apikey_browser' => 'Create browser Apikey', 'production_server' => 'Create Production Server', 'reverse_proxy' => 'Add Reverse Proxy', 'enable_ssl' => 'Eenable SSL', 'staging_server' => 'Create Staging Server', 'staging_domain' => 'Register Staging domain', 'enable_crossmedia' => 'Enable Crossmedia', 'ranking' => 'Enable ranking'];

    public $taskTempleteKey = [
        '{NAME}'=>'',
        '{DISPLAY-NAME}'=>'',
        '{MEDIA-MOOD}'=>'',
        '{MEDIA-SCOPE}'=>'',
        '{MEDIA-SCOPE-DESC}'=>'',
        '{MEDIA-BRANDS}'=>'',
        '{RELEASE-DOMAINS}'=>'',
        
        '{APPID}'=>'',
        '{APIKEY-DEV}'=>'',
        '{APIKEY-PROD}'=>'',
        '{APIKEY-BROWSER-DEV}'=>'',
        '{APIKEY-BROWSER-PROD}'=>'',
        '{CONSOLE-ACCOUNT}'=>'',
        '{STAGING-DOMAIN}'=>'',
        '{ECS-CLUSTER-NAME-DEV}'=>'',
        '{ECS-CLUSTER-IP-DEV}'=>'',
        '{PRODUCTION-DOMAIN}'=>'',
        '{ELASTICBEANSTALK-ENV-NAME-PROD}'=>'',
        '{REVERSE-PROXY-HOST}'=>'',
        '{STAGING-CI-URL}'=>'',
        '{PRODUCTION-CI-URL}'=>'',
        '{STAGING-SERVER-MANAGE-URL}'=>'',
        '{PRODUCTION-SERVER-MANAGE-URL}'=>'',
        ];

    public $taskStatus = [1=>'Pending', 2=>'Workable',3=>'Progress',4=>'Completed'];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tasks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MediaRequests', [
            'foreignKey' => 'media_request_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TaskTypes', [
            'foreignKey' => 'task_type_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'task_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'tasks_users'
        ]);

        $this->belongsTo('MediaSysinfo', [
            'foreignKey' => 'media_request_id',
            'bindingKey' => 'media_request_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('alias');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('backlog_progress_url');

        $validator
            ->allowEmpty('chatwork_progress_url');

        $validator
            ->integer('state')
            ->allowEmpty('state');

        $validator
            ->allowEmpty('requirements');

        $validator
            ->boolean('isactive')
            ->allowEmpty('isactive');

        $validator
            ->boolean('isdel')
            ->allowEmpty('isdel');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

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
        $rules->add($rules->existsIn(['media_request_id'], 'MediaRequests'));

        return $rules;
    }


/**    
* updateOtherTaskStatus Method for Listing data
* By Tarikul Islam (www.tarikul.com)
* 
* @throws NotFoundException
* @param string $id
* @return void
*/
    Public function updateOtherTaskStatus($medaReqId){
        $fields = [];
        $conditions = ['media_request_id' => $medaReqId ];

        $sysinfo = $this->MediaSysinfo->find('all',[
            'conditions'=>['media_request_id'=>$medaReqId],
            'contain' =>['MediaRequests']
            ])->first();
        $sysinfoArray = $sysinfo->toArray();

        $tasks = $this->find('all',['conditions'=>['media_request_id'=>$medaReqId]])->all();

        foreach ($tasks as $key => $task) {
            $fields = !empty($task->dependencies) ? explode(',', $task->dependencies) : [];
            $flag = true;
            foreach ($fields as $key => $value) {
                if ( (array_key_exists($value, $sysinfoArray) && empty($sysinfoArray[$value])) ||
                 (array_key_exists($value, $sysinfoArray['media_request']) && empty($sysinfoArray['media_request'][$value])) ) {
                    $flag = false;
                }
            }

            if ($flag && ($task->state < 2) ) {
                $task->state = 2;
                $this->save($task);
            }
        } //end forloop

    }

}
