<?php

namespace Adamski\Symfony\HelpersBundle\Twig;

use Adamski\Symfony\RoutingBundle\Helper\RoutingHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoutePathExtension extends AbstractExtension {

    /**
     * @var RoutingHelper
     */
    protected $routingHelper;

    /**
     * RoutePathExtension constructor.
     *
     * @param RoutingHelper $routingHelper
     */
    public function __construct(RoutingHelper $routingHelper) {
        $this->routingHelper = $routingHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
            new TwigFunction("route_path", [$this, "routePath"])
        ];
    }

    /**
     * Print path of route with provided name.
     *
     * @param string $value
     * @return null|string
     */
    public function routePath(string $value) {
        if (null !== ($generatedPath = $this->routingHelper->getPath($value))) {
            return $generatedPath;
        }

        return "";
    }
}
