<?php

namespace Dlinc\Twig;


class AttributeBoolean extends AttributeValueBase {

    /**
     * {@inheritdoc}
     */
    public function render() {
        return $this->__toString();
    }

    /**
     * Implements the magic __toString() method.
     */
    public function __toString() {
        return $this->value === FALSE ? '' : Html::escape($this->name);
    }

}