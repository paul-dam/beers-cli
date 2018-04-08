<?php

namespace PaulDam\BeersCli;

class StorageAggregate extends CollectionAbstract
{
    /**
     * @var Storage[] $items
     */
    private $items;

    public function __construct(array $items, int $flags = 0)
    {
        parent::__construct($items, $flags);
    }

    public function save(BeerCollection $beers): void
    {
        foreach ($this->items as $storage) {
            $storage->save($beers);
        }
    }
}
