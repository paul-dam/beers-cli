<?php namespace PaulDam\BeersCli;

interface WriterInterface
{
    /**
     * @param String $content
     */
    public function write(String $content): void;
}
