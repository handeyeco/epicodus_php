<?php

class Queen {
  public $x_pos;
  public $y_pos;

  function __construct ($x, $y) {
    $this->x_pos = $x;
    $this->y_pos = $y;
  }

  function canAttack ($piece_x, $piece_y) {
    return ($piece_x == $this->x_pos || $piece_y == $this->y_pos || ($piece_x - $this->x_pos) == ($piece_y - $this->y_pos));
  }
}

?>
