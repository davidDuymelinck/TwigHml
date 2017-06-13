<?php

namespace Dlinc\Twig;


class PlainTextOutput implements OutputStrategyInterface {

    /**
     * {@inheritdoc}
     */
    public static function renderFromHtml($string) {
        return Html::decodeEntities(strip_tags((string) $string));
    }

}