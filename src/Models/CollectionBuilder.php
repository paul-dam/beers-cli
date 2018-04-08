<?php

namespace PaulDam\BeersCli\Models;

/**
 * Class CollectionBuilder.
 *
 * @package PaulDam\BeersCli
 */
class CollectionBuilder
{
    /**
     * @var LabelCollectionBuilder
     */
    private $labelCollectionBuilder;

    /**
     * CollectionBuilder constructor.
     * @param LabelCollectionBuilder $labelCollectionBuilder
     */
    public function __construct(
        LabelCollectionBuilder $labelCollectionBuilder
    ) {
        $this->labelCollectionBuilder = $labelCollectionBuilder;
    }

    /**
     * @param array $data
     * @return BeerCollection
     */
    public function fromData(array $data)
    {
        $beersArray = array_map(function ($beerData) {
            $labelsData = isset($beerData['labels']) ? $beerData['labels'] : [];
            $labelsData = $labelsData === null ? [] : $labelsData;

            return new Beer(
                $beerData['id'],
                $beerData['name'],
                isset($beerData['description']) ? $beerData['description'] : '',
                $this->labelCollectionBuilder->fromData($labelsData)
            );
        }, $data['data']);

        return new BeerCollection($beersArray);
    }
}
