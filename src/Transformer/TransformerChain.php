<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class TransformerChain implements \IteratorAggregate
{
    /** @var array */
    private $transformers;

    /**
     * @param array $transformers
     */
    public function __construct(array $transformers = [])
    {
        $this->transformers = $transformers;
    }

    /**
     * @param TransformerInterface $transformer
     */
    public function add(TransformerInterface $transformer)
    {
        $this->transformers[] = $transformer;
    }

    /**
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->transformers);
    }
}
