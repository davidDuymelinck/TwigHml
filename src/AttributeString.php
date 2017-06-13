<?php

namespace Dlinc\Twig;


class AttributeString extends AttributeValueBase {

    /**
     * Implements the magic __toString() method.
     */
    public function __toString() {
        return Html::escape($this->value);
    }

}