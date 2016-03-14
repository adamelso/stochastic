<?php

namespace spec\Stochastic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarkovSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['A', 'B', 'C', 'D']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(\Stochastic\Markov::class);
    }

    function it_is_an_iterator()
    {
        $this->shouldHaveType(\Iterator::class);
    }

    function it_starts_with_the_first_transition_state()
    {
        $this->current()->shouldBe('A');
    }

    function it_transitions_to_the_next_random_state()
    {
        // Set probability to 1 of transitioning to state B
        // or set to 0 for state A
        // http://setosa.io/blog/2014/07/26/markov-chains/

        $this->next();
        //$this->current()->shouldNotBe('A');
    }

    function it_returns_the_index_of_the_current_state()
    {
        $this->next();
        $this->next();
        $this->key()->shouldBe(2);
    }

    function it_validates_the_current_state()
    {
        // Do more than 5
        $this->next();
        $this->next();
        $this->next();
        $this->next();
        $this->next();
        $this->next();

        $this->valid()->shouldBe(true);
    }

    function it_resets_the_chain_to_the_first_state()
    {
        $this->next();
        $this->next();
        $this->next();

        $this->rewind();

        $this->current()->shouldBe('A');
    }
}
