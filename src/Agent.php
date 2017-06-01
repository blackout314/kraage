<?php

namespace Kraage;

class Agent {
  private $logs;
  public function __construct() {
    $this->_log('start');
  }

  private function _log($msg) {
    $this->logs[] = date('Ymd-Hi')." {$msg}"."\n";
  }
  public function getLogs() {
    return $this->logs;
  }
}
