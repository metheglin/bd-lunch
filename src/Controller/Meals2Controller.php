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

        // ====
        // ==== If none of meal countries selected,
        // ==== try searching by the user's country
        // ==== 
        if ( empty($params['meal_country']) ) {
            $params['meal_country'] = $user->country;
        }
        // ====
        // ==== 
        
        $weekday = date('w') + 1;
        $options = [
            'conditions'=>[
                'Menues.isdel IS NULL',
                'Menues.weekday' => $weekday,
                'Menues.country' => strtoupper($params['meal_country']),
            ],
        ];
        $menues = $Menues->find('all', $options)->all();

        // ====
        // ==== If selected country's meal not prepared at this day,
        // ==== fetch menues as 'BD'
        // ==== 
        if ( count($menues) <= 0 ) {
            $options = [
                'conditions'=>[
                    'Menues.isdel IS NULL',
                    'Menues.weekday' => $weekday,
                    'Menues.country' => 'BD',
                ],
            ];
            $menues = $Menues->find('all', $options)->all();
        }
        // ====
        // ==== 

        $this->set('menues', $menues);
    }

}
