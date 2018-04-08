<?php namespace PaulDam\BeersCli;

interface BeerRendererInterface
{
    /**
     * @param BeerCollection $beers
     * @return String
     */
    public function render(BeerCollection $beers): String;
}
