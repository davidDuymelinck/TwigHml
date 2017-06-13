<?php

namespace Dlinc\Twig;


interface MarkupInterface extends \JsonSerializable {

    /**
     * Returns markup.
     *
     * @return string
     *   The markup.
     */
    public function __toString();

}