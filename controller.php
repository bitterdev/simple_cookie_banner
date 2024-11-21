<?php

namespace Concrete\Package\SimpleCookieBanner;

use Bitter\SimpleCookieBanner\Provider\ServiceProvider;
use Concrete\Core\Package\Package;
use Concrete\Core\Entity\Package as PackageEntity;

class Controller extends Package
{
    protected string $pkgHandle = 'simple_cookie_banner';
    protected string $pkgVersion = '0.1.8';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/SimpleCookieBanner' => 'Bitter\SimpleCookieBanner',
    ];

    public function getPackageDescription(): string
    {
        return t('The one and only cookie banner add-on for Concrete CMS.');
    }

    public function getPackageName(): string
    {
        return t('Simple Cookie Banner');
    }

    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        /** @noinspection PhpUnhandledExceptionInspection */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}
