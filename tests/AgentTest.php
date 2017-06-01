<?php

use PHPUnit\Framework\TestCase;
use Kraage\Agent;

class AgentTest extends TestCase {
  /**
   * @test
   */
  public function createAgent() {
    $agent = new Agent();

    $this->assertInstanceOf(\Kraage\Agent::class, $agent);
  }
}
