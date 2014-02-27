<?php

namespace Sandbox\FrontBundle\Menu;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;

use Bigfoot\Bundle\NavigationBundle\Entity\Menu\Item\Attribute;
use Bigfoot\Bundle\NavigationBundle\Manager\Menu\Item\UrlManager;

/**
 * Menu Builder
 */
class Builder
{
    protected $factory;
    protected $entityManager;
    protected $security;
    protected $eventDispatcher;
    protected $urlManager;

    /**
     * Construct Builder
     */
    public function __construct(FactoryInterface $factory, EntityManager $entityManager, SecurityContextInterface $security, EventDispatcher $eventDispatcher, UrlManager $urlManager)
    {
        $this->factory         = $factory;
        $this->entityManager   = $entityManager;
        $this->security        = $security;
        $this->eventDispatcher = $eventDispatcher;
        $this->urlManager      = $urlManager;
    }

    public function createMainMenu(Request $request)
    {
        $mainMenu = $this->factory->createItem('main_sandbox');

        $mainMenu->setChildrenAttributes(
            array(
                'class' => 'nav navbar-nav',
            )
        );

        $menu = $this->entityManager->getRepository('BigfootNavigationBundle:Menu')->findOneBySlug('main-sandbox');

        if ($menu) {
            foreach ($menu->getItems() as $item) {
                $itemParameters = array(
                    'label' => $item->getName(),
                );

                if ($item->getRoute()) {
                    $parameters              = $this->urlManager->getParameters($item);
                    $itemParameters['route'] = $item->getRoute()->getName();

                    if ($parameters) {
                        $itemParameters['routeParameters'] = $parameters;
                    }
                } else {
                    $itemParameters['uri'] = '#';
                }

                $child = $mainMenu->addChild($item->getSlug(), $itemParameters);

                foreach ($item->getAttributesByType(Attribute::LINK) as $attribute) {
                    $child->setLinkAttribute($attribute->getName(), $attribute->getValue());
                }
            }
        }

        return $mainMenu;
    }
}