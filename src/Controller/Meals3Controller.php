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

        if ( empty($params['meal_country']) ) {
            $params['meal_country'] = $user->country;
        }
        
        $weekday = date('w') + 1;
        $options = [
            'conditions'=>[
                'Menues.isdel IS NULL',
                'Menues.weekday' => $weekday,
                'Menues.country' => strtoupper($params['meal_country']),
            ],
        ];
        $menues = $Menues->find('all', $options)->all();

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
        // ==== Dessert Introduction
        // ====
        if ( empty($params['dessert_country']) ) {
            $params['dessert_country'] = $user->country;
        }
        $options = [
            'conditions'=>[
                'Menues.isdel IS NULL',
                'Menues.kind' => 'dessert',
                'Menues.country' => strtoupper($params['dessert_country']),
            ],
        ];
        $desserts = $Menues->find('all', $options)->all();
        if ( count($desserts) <= 0 ) {
            $options = [
                'conditions'=>[
                    'Menues.isdel IS NULL',
                    'Menues.kind' => 'dessert',
                    'Menues.country' => 'BD',
                ],
            ];
            $desserts = $Menues->find('all', $options)->all();
        }
        // ====
        // ====

        // ====
        // ==== Drink Introduction
        // ====
        if ( empty($params['drink_country']) ) {
            $params['drink_country'] = $user->country;
        }
        $options = [
            'conditions'=>[
                'Menues.isdel IS NULL',
                'Menues.kind' => 'drink',
                'Menues.country' => strtoupper($params['drink_country']),
            ],
        ];
        $drinks = $Menues->find('all', $options)->all();
        if ( count($drinks) <= 0 ) {
            $options = [
                'conditions'=>[
                    'Menues.isdel IS NULL',
                    'Menues.kind' => 'drink',
                    'Menues.country' => 'BD',
                ],
            ];
            $drinks = $Menues->find('all', $options)->all();
        }
        // ====
        // ====

        $this->set('menues', $menues);
        $this->set('desserts', $desserts);
        $this->set('drinks', $drinks);
    }

}
