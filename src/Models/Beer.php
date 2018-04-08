<?php

namespace PaulDam\BeersCli\Models;

/**
 * Class Beer.
 *
 * @package PaulDam\BeersCli
 */
class Beer implements \JsonSerializable
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var LabelCollection $labels
     */
    private $labels;

    /**
     * Beer constructor.
     *
     * @param $id
     * @param $name
     * @param $description
     * @param $labels
     */
    public function __construct($id, $name, $description, $labels)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->labels = $labels;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return LabelCollection
     */
    public function getLabels(): LabelCollection
    {
        return $this->labels;
    }

    /**
     * @param Beer $other
     * @return bool
     */
    public function equals(Beer $other): bool
    {
        return $this->getId() === $other->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'labels' => json_encode($this->getLabels()),
        ];
    }
}
