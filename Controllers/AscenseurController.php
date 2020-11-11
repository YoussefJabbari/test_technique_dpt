<?php

require __DIR__."/../Models/Ascenseur.php";

/**
 * Ascenseur Controller
 * This controller has one action : go to floor number N
 */
class AscenseurController {
  /**
   * Function that create an instance for Ascenseur model and bring him to the requested floor if it's possible
   * @param int $id Ascenseur's id
   * @param string $serial_number Ascenseur's SERIAL NUMBER
   * @param int $actual_floor Ascenseur's actual floor
   * @param int $requested_floor Requested floor
   * @return array contains :
   * - status (failed or success)
   * - failed case:
   *   - cause (cause of failed request)
   * - success case:
   *   - action (up, down or none)
   *   - actual floor (floor after executing action)
   *   - steps (number of steps)
   */
  public function goToFloorN ($id, $serial_number, $actual_floor, $requested_floor) {
    $ascenseur = new Ascenseur($id, $serial_number, $actual_floor);

    if ($requested_floor > $ascenseur->getMaxFloor() || $requested_floor < $ascenseur->getMinFloor()) {
      return [
        "status" => "failed",
        "cause" => "inexistent_floor"
      ];
    } else {
      if ($requested_floor == $ascenseur->getActualFloor()) {
        return [
          "status" => "success",
          "actual_floor" => $ascenseur->getActualFloor(),
          "action" => "none",
          "steps" => 0
        ];
      } else if ($requested_floor > $ascenseur->getActualFloor()) {
        $steps = $requested_floor - $ascenseur->getActualFloor();
        for ($i = 0; $i < $steps; $i++) {
          $ascenseur->goUp();
        }
        return [
          "status" => "success",
          "actual_floor" => $ascenseur->getActualFloor(),
          "action" => "up",
          "steps" => $steps
        ];
      } else {
        $steps = $ascenseur->getActualFloor() - $requested_floor;
        for ($i = 0; $i < $steps; $i++) {
          $ascenseur->goDown();
        }
        return [
          "status" => "success",
          "actual_floor" => $ascenseur->getActualFloor(),
          "action" => "down",
          "steps" => $steps
        ];
      }
    }
  }
}