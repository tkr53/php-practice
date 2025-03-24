<?php

namespace FizzBuzz\Core;

use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
  public function testConvertWithEmptyRole()
  {
    $fizzBuzz = new NumberConverter([]);
    $this->assertEquals('', $fizzBuzz->convert(1));
  }

  public function testConvertWithSingleRole()
  {
    $fizzBuzz = new NumberConverter([
      $this->createMockRule(1, '', true, 'Replaced'),
    ]);
    $this->assertEquals('Replaced', $fizzBuzz->convert(1));
  }

  public function testConvertWithFizzBuzzRole()
  {
    $fizzBuzz = new NumberConverter([
      $this->createMockRule(1, '', true, 'Fizz'),
      $this->createMockRule(1, 'Fizz', true, 'FizzBuzz'),
    ]);
    $this->assertEquals('FizzBuzz', $fizzBuzz->convert(1));
  }

  public function testConvertWithUnmatchedFizzBuzzRulesAndConstantRule()
  {
    $fizzBuzz = new NumberConverter([
      $this->createMockRule(1, '', false, 'Fizz'),
      $this->createMockRule(1, '', false, 'Buzz'),
      $this->createMockRule(1, '', true, '1'),
    ]);
    $this->assertEquals('1', $fizzBuzz->convert(1));
  }

  private function createMockRule(
    int $expectedNumber,
    string $expectedCarry,
    bool $matchResult,
    string $replacement
  ): ReplaceRuleInterface
  {
    $role = $this->createMock(ReplaceRuleInterface::class);
    $role->expects($this->any())
      ->method('apply')
      ->with($expectedCarry, $expectedNumber)
      ->willReturn($replacement);
    $role->expects($this->atLeastOnce())
      ->method('match')
      ->with($expectedCarry, $expectedNumber)
      ->willReturn($matchResult);
    return $role;
  }
}