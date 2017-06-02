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
    $this->Logs->_log('Balance');
    return $this->KrakenAPI->QueryPrivate('Balance');
  }

  public function getOpenOrders() {
    $this->Logs->_log('OpenOrders');
    return $this->KrakenAPI->QueryPrivate('OpenOrders', ['trades' => true]);
  }

  public function buy($price, $volume) {
    return $this->KrakenAPI->QueryPrivate('AddOrder', [
      'pair'      => 'XBTCZEUR',
      'type'      => 'buy',
      'ordertype' => 'limit',
      'price'     => $price, 
      'volume'    => $volume,
      'leverage'  => '2:1', 
      'close' => [
        'ordertype' => 'stop-loss-profit',
        'price'     => '#5%',  // stop loss price (relative percentage delta)
        'price2'    => '#10'  // take profit price (relative delta)
      ]
    ]);
  }

  public function sell($price, $volume) {
    return $this->KrakenAPI->QueryPrivate('AddOrder', [
      'pair'      => 'XBTCZEUR',
      'type'      => 'sell', 
      'ordertype' => 'limit', 
      'price'     => $price, 
      'volume'    => $volume
    ]);
  }

  public function getLogs() {
    return $this->Logs->getLogs();
  }
}
