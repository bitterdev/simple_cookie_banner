<?php

namespace Concrete\Package\SimpleCookieBanner\Block\ManageCookieSettings;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Error\ErrorList\ErrorList;

class Controller extends BlockController
{

    protected $btTable = 'btManageCookieSettings';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockOutputLifetime = 300;

    public function getBlockTypeDescription()
    {
        return t("Add manage cookie settings link to your site.");
    }

    public function getBlockTypeName()
    {
        return t("Manage Cookie Settings");
    }

}
