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
        $Users  = TableRegistry::get('Users');
        $Menues = TableRegistry::get('Menues');
        $Meals  = TableRegistry::get('Meals');
        $Desserts  = TableRegistry::get('Desserts');
        $Drinks  = TableRegistry::get('Drinks');
        
        $user = $Users->get($id);

        $params = $this->request->getData();

        //
        // Meals
        //
        $organizer = new \App\Model\Service\MealOrganizer($user, 
            $Meals->getTodayMenu(),
            [
                "country" => !empty($params['meal_country']) ? $params['meal_country'] : null,
                "meal_nonchili" => !empty($params['meal_nonchili']) ?: false,
            ]
        );
        $mainMeals = $organizer->getMain();
        $subMeals = $organizer->getSub();
        $menues = array_merge( $mainMeals, $subMeals );

        //
        // Dessert
        //
        $desOrganizer = new \App\Model\Service\DessertOrganizer($user, 
            $Desserts->getMenu(),
            ["country" => !empty($params['dessert_country']) ? $params['dessert_country'] : null,]
        );
        $desserts = $desOrganizer->getDessert();

        //
        // Drink
        //
        $drinkOrganizer = new \App\Model\Service\DrinkOrganizer($user,
            $Drinks->getMenu(),
            [
                "country" => !empty($params['drink_country']) ? $params['drink_country'] : null,
                "drink_nonsugar" => !empty($params['drink_nonsugar']) ?: false,
            ]
        );
        $drinks = $drinkOrganizer->getDrink();
        $drinkInsts = $drinkOrganizer->getInstrument();
        $drinks = array_merge( $drinks, $drinkInsts );

        //
        // Instruments
        //
        $instOrganizer = new \App\Model\Service\InstrumentOrganizer($user);
        $instruments = $instOrganizer->getInstrument();

        $this->set('menues', $menues);
        $this->set('desserts', $desserts);
        $this->set('drinks', $drinks);
        $this->set('instruments', $instruments);
    }

}
