<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class MenuBuilder
 * @package AppBundle\Menu
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
    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'vertical medium-horizontal menu'));

        // $menu = $this->factory->createItem('Home', array('extras' => array('menu_type' => 'topmenu')));
        $menu->addChild('Home', array('route' => 'homepage'))
                ->setAttribute('class', '');


        $menu->addChild('Magazine Collection App', array('route' => 'publication_index'))
            ->setAttribute('icon', 'fa fa-home');

        return $menu;
    }



}
