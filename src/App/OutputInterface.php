<?php
namespace FizzBuzz\App;


interface OutputInterface
{
  public function write(string $message): void;
}