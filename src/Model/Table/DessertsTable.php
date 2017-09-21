<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Desserts Model
 */
class DessertsTable extends MenuesTable
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

        $this->setTable('menues');
        $this->setEntityClass('App\Model\Entity\Menu');
    }

    public function kinds() {
        return ["dessert",];
    }

    public function getMenu( $weekday=null ) {
        $options = [
            'conditions'=>[
                'isdel IS NULL',
                'kind IN' => $this->kinds(),
            ],
        ];
        return $this->find('all', $options)->toArray();
    }

}
