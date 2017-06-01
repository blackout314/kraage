<?php

use PHPUnit\Framework\TestCase;
use Kraage\Agent;

class AgentTest extends TestCase {
  /**
   * @test
   */
  public function createAgent() {
    $mockKrakenAPI = $this->getMockBuilder('Payward\KrakenAPI')
      ->setConstructorArgs(['KEY','SEC'])
      ->getMock();

    $mockLogs = $this->getMockBuilder('Kraage\Logs')
      ->setMethods(array('_log'))
      ->getMock();

    $mockLogs->expects($this->once())
      ->method('_log');

    $agent = new Agent($mockLogs, $mockKrakenAPI);
  }

}
