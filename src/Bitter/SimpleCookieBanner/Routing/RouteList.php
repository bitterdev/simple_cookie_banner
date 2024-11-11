<?php

namespace Bitter\SimpleCookieBanner\Routing;

use Bitter\SimpleCookieBanner\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\SimpleCookieBanner\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\SimpleCookieBanner\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/simple_cookie_banner')
            ->routes('dialogs/support.php', 'simple_cookie_banner');
    }
}