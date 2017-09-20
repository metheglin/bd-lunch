<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MediaRequests Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\MediaSysinfoTable|\Cake\ORM\Association\HasMany $MediaSysinfo
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\MediaRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\MediaRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MediaRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MediaRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediaRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MediaRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MediaRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MediaRequestsTable extends Table
{
    public $optionDropdown = [
         'media-mode'=> ['BrandSite'=>'BrandSite', 'BlogWeb' => 'BlogWeb', 'Lightver' => 'Lightver', 'ECWeb' => 'ECWeb', 'Others' => 'Others'],
         'media-scope'=> ['Company'=>'Company', 'Brand' => 'Brand', 'Others' => 'Others'],
        ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('media_requests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasOne('MediaSysinfo', [
            'foreignKey' => 'media_request_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'media_request_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('display_name', 'create')
            ->notEmpty('display_name');

        $validator
            ->allowEmpty('media_mode');

        $validator
            ->requirePresence('media_scope', 'create')
            ->notEmpty('media_scope');

        $validator
            ->allowEmpty('media_scope_desc');

        $validator
            ->allowEmpty('media_brands');

        $validator
            ->allowEmpty('release_domains');

        $validator
            ->allowEmpty('director_chatids');

        $validator
            ->boolean('use_apikey_server')
            ->allowEmpty('use_apikey_server');

        $validator
            ->boolean('use_apikey_browser')
            ->allowEmpty('use_apikey_browser');

        $validator
            ->boolean('use_production')
            ->allowEmpty('use_production');

        $validator
            ->boolean('prod_reverse_proxy')
            ->allowEmpty('prod_reverse_proxy');

        $validator
            ->boolean('prod_ssl')
            ->allowEmpty('prod_ssl');

        $validator
            ->boolean('use_staging')
            ->allowEmpty('use_staging');

        $validator
            ->boolean('use_crossmedia')
            ->allowEmpty('use_crossmedia');

        $validator
            ->boolean('use_ranking')
            ->allowEmpty('use_ranking');

        $validator
            ->boolean('hostedby_everforth')
            ->allowEmpty('hostedby_everforth');

        $validator
            ->integer('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

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
                'isdel IS NULL',
                'isactive'=>true,
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
