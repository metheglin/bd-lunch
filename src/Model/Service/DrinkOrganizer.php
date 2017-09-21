<?php
namespace App\Model\Service;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class DrinkOrganizer
{

    public $user, $drinks, $options;
    public function __construct( $user, $drinks=[], $options=[] ) {
      $this->user = $user;
      $this->drinks = $drinks;
      $this->options = $options;
    }

    public function getDrink() {
      $country = $this->drinkCountry();
      $menues = $this->filterDrinks( $country, "drink" );
      if ( count($menues) <= 0 ) {
        $menues = $this->filterDrinks( "BD", "drink" );
      }
      return $menues;
    }

    public function anyDrinkAllowSugar() {
      foreach ( $this->getDrink() as $drink ) {
        $opts = explode(",", $drink->options);
        if (  in_array("allow_sugar", $opts, true) ) return true;
      }
      return false;
    }

    public function getInstrument() {
      if ( $this->options["drink_nonsugar"] ) return [];
      if ( $this->anyDrinkAllowSugar() ) {
        return [
          new \App\Model\Entity\Instrument(["name" => "sugar-pot", "country" => null,])
        ];
      }
      return [];
    }

    public function filterDrinks( $country, $kind ) {
      return array_filter($this->drinks, function($m) use ($country, $kind) {
        return $m->country === $country && $m->kind === $kind;
      });
    }

    /**
     * [
     *   "country" => "BD",
     * ]
     */
    public function drinkCountry() {
      $country = $this->options["country"];
      if ( empty($country) ) {
        $country = strtoupper($this->user->country);
      }
      return $country;
    }

}
