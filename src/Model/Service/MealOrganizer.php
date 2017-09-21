<?php
namespace App\Model\Service;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class MealOrganizer
{

    public $user, $meals, $options;
    public function __construct( $user, $meals=[], $options=[] ) {
      $this->user = $user;
      $this->meals = $meals;
      $this->options = $options;
    }

    public function getMain() {
      $country = $this->mealCountry();
      $menues = $this->filterMeals( $country, "main" );
      if ( count($menues) <= 0 ) {
        $menues = $this->filterMeals( "BD", "main" );
      }
      return $menues;
    }

    public function getSub() {
      $country = $this->mealCountry();
      $menues = $this->filterMeals( $country, "sub" );
      if ( count($menues) <= 0 ) {
        $menues = $this->filterMeals( "BD", "sub" );
      }
      return $menues;
    }

    public function filterMeals( $country, $kind ) {
      return array_filter($this->meals, function($m) use ($country, $kind) {
        return $m->country === $country && $m->kind === $kind;
      });
    }

    /**
     * [
     *   "country" => "BD",
     *   "meal_nonchili" => true,
     * ]
     */
    public function mealCountry() {
      $country = strtoupper($this->options["country"]);
      if ( empty($country) ) {
        $country = strtoupper($this->user->country);
      }
      if ( !empty($this->options["meal_nonchili"]) && ($country === "BD" || $country === "IN") ) {
        return "JP";
      }
      return $country;
    }

}
