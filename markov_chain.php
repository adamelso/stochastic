<?php

require __DIR__.'/vendor/autoload.php';

$markovChain = new \Stochastic\Markov(['A', 'B', 'C', 'D', 'E'], 100);

foreach ($markovChain as $result) {
    print $result;

    print ' -> ';
}

print 'O' . PHP_EOL;
