<?php

namespace Kraage;

class Logs {
  private $logs;

  public function _log($msg) {
    $this->logs[] = date('Ymd-Hi')." {$msg}"."\n";
  }
  public function getLogs() {
    return $this->logs;
  }
}
