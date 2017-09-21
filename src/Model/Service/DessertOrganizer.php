<?php
namespace App\Model\Service;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class DessertOrganizer
{

    public $user, $desserts, $options;
    public function __construct( $user, $desserts=[], $options=[] ) {
      $this->user = $user;
      $this->desserts = $desserts;
      $this->options = $options;
    }

    public function getDessert() {
      $country = $this->dessertCountry();
      $menues = $this->filterDesserts( $country, "dessert" );
      if ( count($menues) <= 0 ) {
        $menues = $this->filterDesserts( "BD", "dessert" );
      }
      return $menues;
    }

    public function filterDesserts( $country, $kind ) {
      return array_filter($this->desserts, function($m) use ($country, $kind) {
        return $m->country === $country && $m->kind === $kind;
      });
    }

    /**
     * [
     *   "country" => "BD",
     * ]
     */
    public function dessertCountry() {
      $country = $this->options["country"];
      if ( empty($country) ) {
        $country = strtoupper($this->user->country);
      }
      return $country;
    }

}
