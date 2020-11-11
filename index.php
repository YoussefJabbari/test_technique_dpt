<?php

/**
 * Router
 * Return json object
 */

require('Controllers/AscenseurController.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'goToFloorN') {
    if (isset($_GET['id']) && isset($_GET['serial_number']) && isset($_GET['actual_floor']) && isset($_GET['requested_floor'])) {
      $id = $_GET['id'];
      $serial_number = $_GET['serial_number'];
      $actual_floor = $_GET['actual_floor'];
      $requested_floor = $_GET['requested_floor'];
      $controller = new AscenseurController();
      $returned_value = $controller->goToFloorN($id, $serial_number, $actual_floor, $requested_floor);
    } else {
      $returned_value = [
        "status" => "failed",
        "cause" => "missing_attributes"
      ];
    }
  } else {
    $returned_value = [
      "status" => "failed",
      "cause" => "unknown_action"
    ];
  }
} else {
  $returned_value = [
    "status" => "failed",
    "cause" => "missing_action"
  ];
}

// Display result based on the request
print_r(json_encode($returned_value));
