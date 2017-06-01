<?php

namespace Kraage;

class Agent {
  private $Logs;
  private $KrakenAPI;

  public function __construct(Logs $logs, \Payward\KrakenAPI $krakenapi) {
    $this->Logs = $logs;
    $this->KrakenAPI = $krakenapi;
    $this->Logs->_log('start');
  }

  public function getBalance() {
    return $this->KrakenAPI->QueryPrivate('Balance');
    $this->Logs->_log('Balance');
  }

  public function getLogs() {
    return $this->Logs->getLogs();
  }
}
