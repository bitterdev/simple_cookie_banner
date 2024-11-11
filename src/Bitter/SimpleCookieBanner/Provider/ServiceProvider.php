<?php

namespace Bitter\SimpleCookieBanner\Provider;

use Bitter\SimpleCookieBanner\Routing\RouteList;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Entity\Site\Site;
use Concrete\Core\Foundation\Service\Provider;
use Concrete\Core\Application\Application;
use Concrete\Core\Localization\Localization;
use Concrete\Core\Page\Collection\Version\Version;
use Concrete\Core\Page\Page;
use Concrete\Core\Routing\RouterInterface;
use Concrete\Core\Site\Config\Liaison;
use Concrete\Core\View\View;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Concrete\Core\Config\Repository\Repository;

class ServiceProvider extends Provider
{

    protected EventDispatcherInterface $eventDispatcher;
    protected Repository $config;
    protected Site $site;
    protected Liaison $siteConfig;
    protected RouterInterface $router;

    public function __construct(
        Application              $app,
        EventDispatcherInterface $eventDispatcher,
        Repository               $config,
        RouterInterface          $router
    )
    {
        parent::__construct($app);

        $this->eventDispatcher = $eventDispatcher;
        $this->config = $config;
        $this->router = $router;
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->site = $app->make('site')->getSite();
        $this->siteConfig = $this->site->getConfigRepository();
    }


    public function register()
    {
        $this->router->loadRouteList(new RouteList());

        $al = AssetList::getInstance();

        $al->register("javascript", "cookieconsent", "js/cookieconsent.js", [], "simple_cookie_banner");
        $al->register("css", "cookieconsent", "css/cookieconsent.css", [], "simple_cookie_banner");
        $al->registerGroup("cookieconsent", [
            ["javascript", "cookieconsent"],
            ["css", "cookieconsent"]
        ]);

        $this->eventDispatcher->addListener('on_before_render', function () {
            $c = Page::getCurrentPage();

            if ($c instanceof Page && !$c->isError()) {
                $v = View::getInstance();

                $v->requireAsset("cookieconsent");

                $privacyPage = Page::getByID($this->siteConfig->get("simple_cookie_banner.privacy_page_id"));
                $activeLanguage = substr(Localization::getInstance()->getLocale(), 0, 2);

                $revision = 0;

                if ($privacyPage instanceof Page) {
                    $pv = $privacyPage->getVersionObject();

                    if ($pv instanceof Version) {
                        $revision = $pv->getVersionID();
                    }
                }

                /** @noinspection CssInvalidHtmlTagReference */
                $v->addHeaderItem(
                    "<style>\n" .
                    ".ccm-page {\n" .
                    "  color-scheme: " . $this->siteConfig->get("simple_cookie_banner.css.color_scheme", "light") . ";\n" .
                    "  --cc-bg: " . $this->siteConfig->get("simple_cookie_banner.css.bg", "#f9faff") . ";\n" .
                    "  --cc-primary-color: " . $this->siteConfig->get("simple_cookie_banner.css.primary_color", "#112954") . ";\n" .
                    "  --cc-secondary-color: " . $this->siteConfig->get("simple_cookie_banner.css.secondary_color", "#112954") . ";\n" .
                    "  --cc-btn-primary-bg: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_bg", "#3859d0") . ";\n" .
                    "  --cc-btn-primary-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_color", "#f9faff") . ";\n" .
                    "  --cc-btn-primary-hover-bg: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_bg", "#213657") . ";\n" .
                    "  --cc-btn-primary-hover-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_color", "#fff") . ";\n" .
                    "  --cc-btn-secondary-bg: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_bg", "#3859d0") . ";\n" .
                    "  --cc-btn-secondary-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_color", "#f9faff") . ";\n" .
                    "  --cc-btn-secondary-hover-bg: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_bg", "#213657") . ";\n" .
                    "  --cc-btn-secondary-hover-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_color", "#fff") . ";\n" .
                    "  --cc-cookie-category-block-bg: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_bg", "#ebeff9") . ";\n" .
                    "  --cc-cookie-category-block-border: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_border", "#ebeff9") . ";\n" .
                    "  --cc-cookie-category-block-hover-bg: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_hover_bg", "#dbe5f9") . ";\n" .
                    "  --cc-cookie-category-block-hover-border: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_hover_border", "#dbe5f9") . ";\n" .
                    "  --cc-cookie-category-expanded-block-hover-bg: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_expanded_block_hover_bg", "#ebeff9") . ";\n" .
                    "  --cc-cookie-category-expanded-block-bg: " . $this->siteConfig->get("simple_cookie_banner.css.cookie_category_expanded_block_bg", "#ebeff9") . ";\n" .
                    "  --cc-overlay-bg: " . $this->siteConfig->get("simple_cookie_banner.css.overlay_bg", "rgba(219, 232, 255, 0.85)") . ";\n" .
                    "  --cc-toggle-readonly-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_bg", "#cbd8f1") . ";\n" .
                    "  --cc-toggle-on-knob-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_on_knob_bg", "#f9faff") . ";\n" .
                    "  --cc-toggle-off-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_off_bg", "#8fa8d6") . ";\n" .
                    "  --cc-toggle-readonly-knob-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_knob_bg", "#f9faff") . ";\n" .
                    "  --cc-separator-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.separator_border_color", "#f1f3f5") . ";\n" .
                    "  --cc-footer-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.footer_border_color", "#f1f3f5") . ";\n" .
                    "  --cc-footer-bg: " . $this->siteConfig->get("simple_cookie_banner.css.footer_bg", "#f9faff") . ";\n" .
                    "  --cc-btn-border-radius: " . $this->siteConfig->get("simple_cookie_banner.css.btn_border_radius", ".4rem") . ";\n" .
                    "  --cc-modal-border-radius: " . $this->siteConfig->get("simple_cookie_banner.css.modal_border_radius", ".5rem") . ";\n" .
                    "  --cc-pm-toggle-border-radius: " . $this->siteConfig->get("simple_cookie_banner.css.pm_toggle_border_radius", "1rem") . ";\n" .
                    "  --cc-font-family: " . $this->siteConfig->get("simple_cookie_banner.css.font_family\", \"-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"") . ";\n" .
                    "  --cc-modal-transition-duration: " . $this->siteConfig->get("simple_cookie_banner.css.modal_transition_duration", ".25s") . ";\n" .
                    "  --cc-link-color: " . $this->siteConfig->get("simple_cookie_banner.css.link_color", "#3859d0") . ";\n" .
                    "  --cc-modal-margin: " . $this->siteConfig->get("simple_cookie_banner.css.modal_margin", "1rem") . ";\n" .
                    "  --cc-z-index: " . $this->siteConfig->get("simple_cookie_banner.css.z_index", "2147483647") . ";\n" .
                    "  --cc-btn-primary-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_border_color", "#3859d0") . ";\n" .
                    "  --cc-btn-primary-hover-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_border_color", "#213657") . ";\n" .
                    "  --cc-btn-secondary-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_border_color", "#3859d0") . ";\n" .
                    "  --cc-btn-secondary-hover-border-color: " . $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_border_color", "#d4dae0") . ";\n" .
                    "  --cc-toggle-on-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_on_bg", "#3859d0") . ";\n" .
                    "  --cc-toggle-off-knob-bg: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_off_knob_bg", "#f9faff") . ";\n" .
                    "  --cc-toggle-enabled-icon-color: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_enabled_icon_color", "#f9faff") . ";\n" .
                    "  --cc-toggle-disabled-icon-color: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_disabled_icon_color", "#f9faff") . ";\n" .
                    "  --cc-toggle-readonly-knob-icon-color: " . $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_knob_icon_color", "#cbd8f1") . ";\n" .
                    "  --cc-section-category-border: " . $this->siteConfig->get("simple_cookie_banner.css.section_category_border", "#ebeff9") . ";\n" .
                    "  --cc-webkit-scrollbar-bg: " . $this->siteConfig->get("simple_cookie_banner.css.scrollbar_bg", "#ebeff9") . ";\n" .
                    "  --cc-webkit-scrollbar-hover-bg: " . $this->siteConfig->get("simple_cookie_banner.css.scrollbar_hover_bg", "#213657") . ";\n" .
                    "  --cc-footer-color: " . $this->siteConfig->get("simple_cookie_banner.css.footer_color", "#112954") . ";\n" .
                    "}\n" .
                    "</style>"
                );

                $languages = [];
                $translations = [];

                foreach (array_keys(Localization::getAvailableInterfaceLanguageDescriptions()) as $locale) {
                    $language = substr($locale, 0, 2);

                    if (!in_array($language, $languages)) {
                        $languages[] = $language;
                    }
                }

                foreach ($languages as $language) {
                    $translations[$language] = [
                        "consentModal" => [
                            "label" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.label", "Cookie Consent"),
                            "title" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.title", "We use cookies!"),
                            "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.description", "We use multiple cookies on our website for technical, marketing and for analysis purposes; In principle, you can also visit our website without setting cookies. The technically necessary cookies are excluded from this. You have a right of withdrawal at any time. By clicking on the accept all button, you agree that we set the additional cookies for marketing and analysis purposes."),
                            "acceptAllBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.accept_all_btn", "Accept all"),
                            "acceptNecessaryBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.accept_necessary_btn", "Accept necessary"),
                            "showPreferencesBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.show_preferences_btn", "Manage individual preferences"),
                            "footer" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.consent_modal.footer", ""),
                        ],
                        "preferencesModal" => [
                            "title" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.title", "Cookie Preferences Center"),
                            "acceptAllBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.accept_all_btn", "Accept all"),
                            "acceptNecessaryBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.accept_necessary_btn", "Accept necessary only"),
                            "savePreferencesBtn" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.save_preferences_btn", "Accept current selection"),
                            "closeIconLabel" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.close_icon_label", "Close modal"),
                            "sections" => [
                                [
                                    "title" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.necessary.title", "Necessary Cookies"),
                                    "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.necessary.description", "These cookies are essential for the proper functioning of our website. Without these cookies, the website would not work properly."),
                                    "linkedCategory" => "necessary"
                                ],
                                [
                                    "title" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.title", "Analytics Cookies"),
                                    "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.description", "These cookies allow the website to remember the choices you have made in the past."),
                                    "linkedCategory" => "analytics",
                                    "cookieTable" => [
                                        "caption" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.caption", "List of Cookies"),
                                        "headers" => [
                                            "name" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.headers.name", "Name"),
                                            "domain" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.headers.domain", "Domain"),
                                            "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.headers.description", "Description"),
                                            "duration" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.headers.duration", "Duration"),
                                        ],
                                        "body" => (array)$this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.analytics.cookie_table.body", [])
                                    ]
                                ],
                                [
                                    "title" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.title", "Marketing Cookies"),
                                    "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.description", "These cookies allow the website to remember the choices you have made in the past."),
                                    "linkedCategory" => "marketing",
                                    "cookieTable" => [
                                        "caption" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.caption", "List of Cookies"),
                                        "headers" => [
                                            "name" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.headers.name", "Name"),
                                            "domain" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.headers.domain", "Domain"),
                                            "description" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.headers.description", "Description"),
                                            "duration" => $this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.headers.duration", "Duration"),
                                        ],
                                        "body" => (array)$this->siteConfig->get("simple_cookie_banner.config.language.translations.$language.preferences_modal.sections.marketing.cookie_table.body", [])
                                    ]
                                ]
                            ]
                        ]
                    ];
                }

                /** @noinspection JSUnresolvedVariable */
                /** @noinspection BadExpressionStatementJS */
                /** @noinspection JSUnresolvedFunction */
                /** @noinspection JSVoidFunctionReturnValueUsed */
                $v->addFooterItem(sprintf(
                    '<script>document.addEventListener(\'DOMContentLoaded\', function () { CookieConsent.run(%s) });</script>',
                    json_encode([
                        "root" => ".ccm-page",
                        "mode" => $this->siteConfig->get("simple_cookie_banner.config.mode", "opt-in"),
                        "autoShow" => (bool)$this->siteConfig->get("simple_cookie_banner.config.auto_show", true),
                        "revision" => $revision,
                        "manageScriptTags" => (bool)$this->siteConfig->get("simple_cookie_banner.config.manage_script_tags", true),
                        "autoClearCookies" => (bool)$this->siteConfig->get("simple_cookie_banner.config.auto_clear_cookies", true),
                        "hideFromBots" => (bool)$this->siteConfig->get("simple_cookie_banner.config.hide_from_bots", true),
                        "disablePageInteraction" => (bool)$this->siteConfig->get("simple_cookie_banner.config.disable_page_interaction", false),
                        "lazyHtmlGeneration" => (bool)$this->siteConfig->get("simple_cookie_banner.config.lazy_html_generation", true),
                        "cookie" => [
                            "name" => $this->siteConfig->get("simple_cookie_banner.config.cookie.name", "cc_cookie"),
                            "domain" => $_SERVER['SERVER_NAME'],
                            "path" => $this->siteConfig->get("simple_cookie_banner.config.cookie.path", "/"),
                            "expiresAfterDays" => (int)$this->siteConfig->get("simple_cookie_banner.config.cookie.expires_after_days", 182),
                            "sameSite" => $this->siteConfig->get("simple_cookie_banner.config.cookie.same_site", "Lax"),
                            "useLocalStorage" => (bool)$this->siteConfig->get("simple_cookie_banner.config.cookie.use_local_storage", false)
                        ],
                        "guiOptions" => [
                            "consentModal" => [
                                "layout" => $this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.layout", "box"),
                                "position" => $this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.position", "bottom right"),
                                "flipButtons" => (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.flip_buttons", false),
                                "equalWeightButtons" => (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.equal_weight_buttons", true),
                            ],
                            "preferencesModal" => [
                                "layout" => $this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.layout", "box"),
                                "position" => $this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.position", "right"),
                                "flipButtons" => (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.flip_buttons", false),
                                "equalWeightButtons" => (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.equal_weight_buttons", true),
                            ]
                        ],
                        "categories" => [
                            "necessary" => [
                                "enabled" => true
                            ],
                            "analytics" => [
                                "enabled" => (bool)$this->siteConfig->get("simple_cookie_banner.config.categories.analytics.enabled", true)
                            ],
                            "marketing" => [
                                "enabled" => (bool)$this->siteConfig->get("simple_cookie_banner.config.categories.marketing.enabled", true)
                            ]
                        ],
                        "language" => [
                            "default" => $activeLanguage,
                            "rtl" => (bool)$this->siteConfig->get("simple_cookie_banner.config.language.rtl", false),
                            "autoDetect" => "",
                            "translations" => $translations
                        ]
                    ])
                ));
            }
        });
    }

}