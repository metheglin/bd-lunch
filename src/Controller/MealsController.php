<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * MealsController
 */
class MealsController extends AppController
{

    public function dashboard() {
    }

    /**
     * request method
     *
     * @param string|null $id id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function request($id = 1)
    {
        $Users = TableRegistry::get('Users');
        $Menues = TableRegistry::get('Menues');
        
        $user = $Users->get($id);

        $params = $this->request->getData();
        $weekday = date('w') + 1;
        $options = [
            'conditions'=>[
                'Menues.isdel IS NULL',
                'Menues.weekday' => $weekday,
                'Menues.country' => strtoupper($params['meal_country']),
            ],
        ];
        $menues = $Menues->find('all', $options)->all();

        $this->set('menues', $menues);
    }

}
