<?php
namespace App\Model\Service;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class InstrumentOrganizer
{
    public static function defaultInstruments() {
      return [
        ["name" => "spoon",],
        ["name" => "fork",]
      ];
    }
    public static function instruments() {
      return [
        "JP" => [
          [
            "name" => "chopsticks",
          ],
        ],
        "BD" => [],
        "IN" => [],
        "VN" => [
          [
            "name" => "chopsticks",
          ],
        ],
      ];
    }

    public $user, $options;
    public function __construct( $user, $options=[] ) {
      $this->user = $user;
      $this->options = $options;
    }

    public function getInstrument() {
      $insts = isset(static::instruments()[$this->user->country]) ? 
        static::instruments()[$this->user->country] :
        static::defaultInstruments();
      return array_map(function($x){
        return new \App\Model\Entity\Instrument([
          "name" => $x["name"],
          "country" => $this->user->country,
        ]);
      }, $insts);
    }

}
