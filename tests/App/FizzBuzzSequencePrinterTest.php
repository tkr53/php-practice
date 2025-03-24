<?php
namespace FizzBuzz\App;

use FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class FizzBuzzSequencePrinterTest extends TestCase
{
  public function testPrintNone(): void
  {
    $converter = $this->createMock(NumberConverter::class);
    $converter->expects($this->never())->method('convert');

    $output = $this->createMock(OutputInterface::class);
    $output->expects($this->never())->method('write');

    $printer = new FizzBuzzSequencePrinter($converter, $output);
    $printer->print(0, -1);
  }

  public function testPrint1To3(): void
  {
    $converter = $this->createMock(NumberConverter::class);
    $converter->expects($this->exactly(3))
      ->method('convert')
      ->willReturnMap([
        [1, '1'],
        [2, '2'],
        [3, 'Fizz'],
      ]);

    $output = $this->createMock(OutputInterface::class);
    $output->expects($this->exactly(3))
      ->method('write')
      ->willReturnOnConsecutiveCalls('1: 1', '2: 2', '3: Fizz');

    $printer = new FizzBuzzSequencePrinter($converter, $output);
    $printer->print(1, 3);
  }
}