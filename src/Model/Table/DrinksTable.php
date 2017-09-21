<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drinks Model
 */
class DrinksTable extends MenuesTable
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
        return ["drink",];
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
