Stochastic
==========

Markov chain generator for PHP 5.5.

Implements the PHP `\Iterator` interface.

Example
-------

```php
<?php

require __DIR__.'/vendor/autoload.php';

$markovChain = new \Stochastic\Markov(['A', 'B', 'C', 'D', 'E'], 100);

foreach ($markovChain as $result) {
    print $result;

    print ' -> ';
}

print 'END' . PHP_EOL;
```

This script will output a random chain starting with the first state provided:


```bash
$ php markov_chain.php 
A -> B -> B -> A -> C -> D -> C -> D -> E -> D -> E -> A -> B -> E -> B -> C ->
A -> C -> A -> B -> D -> C -> B -> E -> C -> C -> D -> A -> E -> D -> E -> C ->
D -> B -> E -> B -> C -> C -> C -> A -> E -> B -> B -> A -> B -> C -> D -> B ->
A -> A -> A -> D -> D -> E -> C -> A -> D -> C -> B -> C -> A -> D -> D -> B ->
C -> A -> C -> E -> A -> B -> C -> C -> C -> C -> A -> A -> D -> E -> A -> E ->
C -> C -> E -> D -> B -> D -> B -> A -> B -> D -> C -> C -> C -> B -> E -> C ->
B -> B -> D -> A -> A -> END
```

Coming soon
-----------

Transition matrix for mapping transition probabilities between states.


