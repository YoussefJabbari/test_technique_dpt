<?php

/**
 * Model Ascenseur
 * Ascenseur has two simple commands : goUp / goDown
 */
class Ascenseur {
  // Ascenseur's ID
  private $id;
  // Ascenseur's SERIAL NUMBER, maybe used for communication with HARDWARE
  private $serial_number;
  // Ascenseur's actual floor
  private $actual_floor;
  // Ascenseur's min floor
  private $min_floor = -1;
  // Ascenseur's max floor
  private $max_floor = 5;

  /**
   * Ascenseur's constructor
   * @param int $id Ascenseur's id
   * @param string $serial_number Ascenseur's SERIAL NUMBER
   * @param int $actual_floor Ascenseur's actual floor
   */
  public function __construct ($id, $serial_number, $actual_floor)
  {
    $this->id = $id;
    $this->serial_number = $serial_number;
    $this->actual_floor = $actual_floor;
  }

  /**
   * Get ascenseur's actual floor
   * @return int
   */
  public function getActualFloor()
  {
    return $this->actual_floor;
  }

  /**
   * Get ascenseur's max floor
   * @return int
   */
  public function getMaxFloor()
  {
    return $this->max_floor;
  }

  /**
   * Get ascenseur's min floor
   * @return int
   */
  public function getMinFloor()
  {
    return $this->min_floor;
  }

  /**
   * Function that increments actual floor if it's allowed
   */
  public function goUp ()
  {
    if ($this->actual_floor < $this->max_floor) {
      $this->actual_floor++;
    }
  }

  /**
   * Function that decrements actual floor if it's allowed
   */
  public function goDown ()
  {
    if ($this->actual_floor > $this->min_floor) {
      $this->actual_floor--;
    }
  }
}