<?php

namespace Sm\Study\UarsymfonyBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class MenuBuilder
 * @package UarsymfonyBundle\Menu
 */
class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param RequestStack $requestStack
     * @return \Knp\Menu\ItemInterface
     */
    public function createUarsymfonyMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'menu vertical'));

        $menu->addChild('Publication Index', array('route' => 'publication_index'))
            ->setAttribute('icon', 'fa fa-home');
        $menu->addChild('Issue Index', array('route' => 'issue_index'))
            ->setAttribute('icon', 'fa fa-home');


        return $menu;
    }



}
