<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Math.php';

class MathTest extends TestCase
{
  public function testMin()
  {
    $math = new Math();
    $this->assertEquals(1, $math->min(1, 2));
    $this->assertEquals(1, $math->min(2, 1));
    $this->assertEquals(1, $math->min(1, 1));
    $this->assertEquals(0, $math->min(0, 1));
    $this->assertEquals(0, $math->min(1, 0));
    $this->assertEquals(-1, $math->min(-1, 1));
    $this->assertEquals(-1, $math->min(1, -1));
    $this->assertEquals(0, $math->min(0, PHP_INT_MAX));
    $this->assertEquals(0, $math->min(PHP_INT_MAX, 0));
    $this->assertEquals(PHP_INT_MIN, $math->min(PHP_INT_MIN, PHP_INT_MAX));
    $this->assertEquals(PHP_INT_MIN, $math->min(PHP_INT_MAX, PHP_INT_MIN));
  }

  public function testMax()
  {
    $math = new Math();
    $this->assertEquals(2, $math->max(1, 2));
    $this->assertEquals(2, $math->max(2, 1));
    $this->assertEquals(1, $math->max(1, 1));
    $this->assertEquals(1, $math->max(0, 1));
    $this->assertEquals(1, $math->max(1, 0));
    $this->assertEquals(1, $math->max(-1, 1));
    $this->assertEquals(1, $math->max(1, -1));
    $this->assertEquals(PHP_INT_MAX, $math->max(0, PHP_INT_MAX));
    $this->assertEquals(PHP_INT_MAX, $math->max(PHP_INT_MAX, 0));
    $this->assertEquals(PHP_INT_MAX, $math->max(PHP_INT_MIN, PHP_INT_MAX));
    $this->assertEquals(PHP_INT_MAX, $math->max(PHP_INT_MAX, PHP_INT_MIN));
  }
}