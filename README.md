# TwigHml

After reading the [Symfony frontend refactor](http://symfony.com/blog/refactoring-symfony-com-front-end) article, I noticed the people that did the refactor don't know the Drupal Attribute class.

So I separated the Twig function and filter that allows you to use the Attribute class, and added all the necessary classes. This allows all projects that use Twig to build tag attributes using the Attribute class.

The article example can now be written as:

    {% set listItemClasses = [
      current == item.slug ? 'selected'
    ] %}
    {% set listItemAttr = create_attribute().addClass(listItemClasses) %}
    
    <li {{ listItemAttr|raw }}>Item</li>
    
The main benefit of using the Attribute class is that you can move logic to the top of your template, instead of mixing it with the html. A themer will understand that in order to add a class now, the listItemClasses array needs to be extended.
