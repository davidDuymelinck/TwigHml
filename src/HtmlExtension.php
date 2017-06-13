<?php

namespace Dlinc\Twig;


class HtmlExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('create_attribute', [$this, 'createAttribute']),
        ];
    }

    public function getFilters() {
        return [
            new \Twig_SimpleFilter('without', [$this, 'without'], ['is_variadic' => true]),
        ];
    }

    public function createAttribute(array $attributes = []) {
        return new Attribute($attributes);
    }

    public function without($element, $args) {
        $filtered_element = ($element instanceof \ArrayAccess) ? clone $element : $element ;

        foreach ($args as $arg) {
            if (isset($filtered_element[$arg])) {
                unset($filtered_element[$arg]);
            }
        }
        return $filtered_element;
    }
}