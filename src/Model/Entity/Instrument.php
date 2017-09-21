<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 */
class Instrument
{

    public function __construct( $attributes=[] ) {
      $this->attributes = $attributes;
      $this->name = $attributes["name"];
      $this->kind = "instrument";
      $this->country = $attributes["country"];
    }

    // public function name() {
    //   return $this->attributes["name"];
    // }

    // public function country() {
    //   return $this->attributes["country"];
    // }

}
