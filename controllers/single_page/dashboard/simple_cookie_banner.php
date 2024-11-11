<?php

namespace Concrete\Package\SimpleCookieBanner\Controller\SinglePage\Dashboard;

use Concrete\Core\Page\Controller\DashboardPageController;

class SimpleCookieBanner extends DashboardPageController
{
    public function view()
    {
        return $this->buildRedirectToFirstAccessibleChildPage();
    }
}
