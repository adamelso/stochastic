<?php

namespace Stochastic;

class Markov implements \Iterator
{
    /**
     * @var array
     */
    private $states;

    /**
     * @var mixed
     */
    private $x;

    /**
     * @var int
     */
    private $iteration = 0;

    /**
     * @var int
     */
    private $length;

    /**
     * @param array $states
     * @param int   $length
     */
    public function __construct(array $states, $length = \INF)
    {
        $this->states = $states;
        $this->length = $length;
        $this->x = $states[0];
    }

    public function current()
    {
        return $this->x;
    }

    public function next()
    {
        ++$this->iteration;
        $this->x = $this->states[array_rand($this->states)];
    }

    /**
     * Not sure if this should return the current iteration
     * or the actual key of the value from within the array of states:
     *
     *     return array_search($this->current, $this->states, true);
     */
    public function key()
    {
        //return array_search($this->x, $this->states, true);
        return $this->iteration;
    }

    public function valid()
    {
        return in_array($this->x, $this->states, true) && $this->iteration <= $this->length;
    }

    public function rewind()
    {
        $this->iteration = 0;
        $this->x = $this->states[0];
    }
}
