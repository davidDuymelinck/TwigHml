<?php

namespace Dlinc\Twig;


class AttributeArray extends AttributeValueBase implements \ArrayAccess, \IteratorAggregate {

    /**
     * Ensures empty array as a result of array_filter will not print '$name=""'.
     *
     * @see \Drupal\Core\Template\AttributeArray::__toString()
     * @see \Drupal\Core\Template\AttributeValueBase::render()
     */
    const RENDER_EMPTY_ATTRIBUTE = FALSE;

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset) {
        return $this->value[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value) {
        if (isset($offset)) {
            $this->value[$offset] = $value;
        }
        else {
            $this->value[] = $value;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset) {
        unset($this->value[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset) {
        return isset($this->value[$offset]);
    }

    /**
     * Implements the magic __toString() method.
     */
    public function __toString() {
        // Filter out any empty values before printing.
        $this->value = array_unique(array_filter($this->value));
        return Html::escape(implode(' ', $this->value));
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator() {
        return new \ArrayIterator($this->value);
    }

    /**
     * Exchange the array for another one.
     *
     * @see ArrayObject::exchangeArray
     *
     * @param array $input
     *   The array input to replace the internal value.
     *
     * @return array
     *   The old array value.
     */
    public function exchangeArray($input) {
        $old = $this->value;
        $this->value = $input;
        return $old;
    }

}