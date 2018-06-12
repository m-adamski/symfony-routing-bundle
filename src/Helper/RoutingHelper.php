<?php

namespace Adamski\Symfony\RoutingBundle\Helper;

use Symfony\Component\Routing\RouterInterface;

class RoutingHelper {

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * RoutingHelper constructor.
     *
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router) {
        $this->router = $router;
    }

    /**
     * Get path of route with provided name.
     *
     * @param string $name
     * @return null|string
     */
    public function getPath(string $name) {
        if (null !== ($currentRoute = $this->router->getRouteCollection()->get($name))) {
            return $currentRoute->getPath();
        }

        return null;
    }
}
