<?php

namespace PaulDam\BeersCli;

class Storage
{
    /**
     * @var BeerRendererInterface
     */
    private $renderer;

    /**
     * @var WriterInterface
     */
    private $writer;

    /**
     * Storage constructor.
     * @param BeerRendererInterface $renderer
     * @param WriterInterface $writer
     */
    public function __construct(
        BeerRendererInterface $renderer,
        WriterInterface $writer
    ) {
        $this->renderer = $renderer;
        $this->writer = $writer;
    }

    /**
     * Use renderer to render and writer to save beers to disk.
     *
     * @param BeerCollection $beers
     */
    public function save(BeerCollection $beers)
    {
        $content = $this->renderer->render($beers);

        $this->writer->write($content);
    }
}
