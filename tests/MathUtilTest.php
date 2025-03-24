<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Math.php';
require_once __DIR__ . '/../src/MathUtil.php';

class MathUtilTest extends TestCase
{
  public function testSaturate(): void
  {
    $math = $this->createMock(Math::class);
    $mathUtil = new MathUtil($math);

    $math->expects($this->atLeastOnce())
      ->method('max')
      ->with($this->equalTo(2), $this->equalTo(1))
      ->willReturn(2);

    $math->expects($this->atLeastOnce())
    ->method('min')
    ->with($this->equalTo(2), $this->equalTo(3))
    ->willReturn(2);

    $this->assertEquals(2, $mathUtil->saturate(2, 1, 3));
  }
}