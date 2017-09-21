<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 */
class MealsTable extends MenuesTable
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
        $this->setEntityClass('App\Model\Entity\Meal');
    }

    public function kinds() {
        return ["main", "sub",];
    }

    public function getWeekDay( $weekday=null ) {
        return $weekday ?: (date('w')+1);
    }

    public function getTodayMenu( $weekday=null ) {
        $options = [
            'conditions'=>[
                'isdel IS NULL',
                'kind IN' => $this->kinds(),
                'weekday' => $this->getWeekDay( $weekday ),
            ],
        ];
        return $this->find('all', $options)->toArray();
    }

}
