<?php
namespace FizzBuzz\App;

use FizzBuzz\Core\NumberConverter;

class FizzBuzzSequencePrinter
{
  public function __construct(
    protected NumberConverter $fizzBuzz,
    protected OutputInterface $output
  )
  {
  }
  public function print(int $begin, int $end): void
  {

    for ($i = $begin; $i <= $end; $i++) {
      $text = $this->fizzBuzz->convert($i);
      $formattedText = sprintf('%d: %s', $i, $text);
      $this->output->write($formattedText);
    }
  }
}

class ConsoleOutput implements OutputInterface
{
  public function write(string $message): void
  {
    echo $message . PHP_EOL;
  }
}