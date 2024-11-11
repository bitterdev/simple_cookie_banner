<?php

namespace Concrete\Package\SimpleCookieBanner\Controller\SinglePage\Dashboard\SimpleCookieBanner;

use Concrete\Core\Localization\Localization;
use Concrete\Core\Site\Config\Liaison;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Validation;
use Concrete\Core\Page\Controller\DashboardSitePageController;
use Punic\Language;

class Content extends DashboardSitePageController
{
    protected Liaison $siteConfig;
    protected Validation $formValidator;

    public function on_start()
    {
        parent::on_start();

        $this->siteConfig = $this->getSite()->getConfigRepository();
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->formValidator = $this->app->make(Validation::class);
    }

    public function view()
    {
        $languages = [];

        foreach (array_keys(Localization::getAvailableInterfaceLanguageDescriptions()) as $locale) {
            $language = substr($locale, 0, 2);

            if (!in_array($language, array_keys($languages))) {
                $languages[$language] =  Language::getName($language);
            }
        }

        if ($this->request->getMethod() === "POST") {
            $this->formValidator->setData($this->request->request->all());
            $this->formValidator->addRequiredToken("update_settings");

            if ($this->formValidator->test()) {
                foreach(array_keys($languages) as $languageCode) {

                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.label", $this->request->request->get("consentModalLabel_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.title", $this->request->request->get("consentModalTitle_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.description", $this->request->request->get("consentModalDescription_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.accept_all_btn", $this->request->request->get("consentModalAcceptAllBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.accept_necessary_btn", $this->request->request->get("consentModalAcceptNecessaryBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.show_preferences_btn", $this->request->request->get("consentModalShowPreferencesBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.footer", $this->request->request->get("consentModalFooter_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.title", $this->request->request->get("preferencesModalTitle_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.accept_all_btn", $this->request->request->get("preferencesModalAcceptAllBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.accept_necessary_btn", $this->request->request->get("preferencesModalAcceptNecessaryBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.save_preferences_btn", $this->request->request->get("preferencesModalSavePreferencesBtn_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.close_icon_label", $this->request->request->get("preferencesModalCloseIconLabel_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.necessary.title", $this->request->request->get("preferencesModalSectionNecessaryTitle_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.necessary.description", $this->request->request->get("preferencesModalSectionNecessaryDescription_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.title", $this->request->request->get("preferencesModalSectionAnalyticsTitle_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.description", $this->request->request->get("preferencesModalSectionAnalyticsDescription_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.caption", $this->request->request->get("preferencesModalSectionAnalyticsCookieTableCaption_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.name", $this->request->request->get("preferencesModalSectionAnalyticsCookieTableName_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.domain", $this->request->request->get("preferencesModalSectionAnalyticsCookieTableDomain_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.description", $this->request->request->get("preferencesModalSectionAnalyticsCookieTableDescription_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.duration", $this->request->request->get("preferencesModalSectionAnalyticsCookieTableDuration_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.body", array_values((array)$this->request->request->get("preferencesModalSectionAnalyticsCookieTableBody_" . $languageCode)));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.title", $this->request->request->get("preferencesModalSectionMarketingTitle_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.description", $this->request->request->get("preferencesModalSectionMarketingDescription_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.caption", $this->request->request->get("preferencesModalSectionMarketingCaption_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.name", $this->request->request->get("preferencesModalSectionMarketingName_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.domain", $this->request->request->get("preferencesModalSectionMarketingDomain_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.duration", $this->request->request->get("preferencesModalSectionMarketingDuration_" . $languageCode));
                    $this->siteConfig->save("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.body", array_values((array)$this->request->request->get("preferencesModalSectionMarketingBody_" . $languageCode)));
                }

                $this->set("success", t("The settings has been successfully updated."));
            } else {
                /** @var ErrorList $errorList */
                $errorList = $this->formValidator->getError();

                foreach ($errorList->getList() as $error) {
                    $this->error->add($error);
                }
            }
        }

        $this->set("languages", $languages);

        foreach(array_keys($languages) as $languageCode) {
            $this->set("consentModalLabel_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.label", "Cookie Consent"));
            $this->set("consentModalTitle_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.title", "We use cookies!"));
            $this->set("consentModalDescription_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.description", "We use multiple cookies on our website for technical, marketing and for analysis purposes; In principle, you can also visit our website without setting cookies. The technically necessary cookies are excluded from this. You have a right of withdrawal at any time. By clicking on the accept all button, you agree that we set the additional cookies for marketing and analysis purposes."));
            $this->set("consentModalAcceptAllBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.accept_all_btn", "Accept all"));
            $this->set("consentModalAcceptNecessaryBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.accept_necessary_btn", "Accept necessary"));
            $this->set("consentModalShowPreferencesBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.show_preferences_btn", "Manage individual preferences"));
            $this->set("consentModalFooter_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.consent_modal.footer", ""));
            $this->set("preferencesModalTitle_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.title", "Cookie Preferences Center"));
            $this->set("preferencesModalAcceptAllBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.accept_all_btn", "Accept all"));
            $this->set("preferencesModalAcceptNecessaryBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.accept_necessary_btn", "Accept necessary only"));
            $this->set("preferencesModalSavePreferencesBtn_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.save_preferences_btn", "Accept current selection"));
            $this->set("preferencesModalCloseIconLabel_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.close_icon_label", "Close modal"));
            $this->set("preferencesModalSectionNecessaryTitle_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.necessary.title", "Necessary Cookies"));
            $this->set("preferencesModalSectionNecessaryDescription_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.necessary.description", "These cookies are essential for the proper functioning of our website. Without these cookies, the website would not work properly."));
            $this->set("preferencesModalSectionAnalyticsTitle_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.title", "Analytics Cookies"));
            $this->set("preferencesModalSectionAnalyticsDescription_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.description", "These cookies allow the website to remember the choices you have made in the past."));
            $this->set("preferencesModalSectionAnalyticsCookieTableCaption_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.caption", "List of Cookies"));
            $this->set("preferencesModalSectionAnalyticsCookieTableName_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.name", "Name"));
            $this->set("preferencesModalSectionAnalyticsCookieTableDomain_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.domain", "Domain"));
            $this->set("preferencesModalSectionAnalyticsCookieTableDescription_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.description", "Description"));
            $this->set("preferencesModalSectionAnalyticsCookieTableDuration_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.headers.duration", "Duration"));
            $this->set("preferencesModalSectionAnalyticsCookieTableBody_" . $languageCode, (array)$this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.analytics.cookie_table.body", []));
            $this->set("preferencesModalSectionMarketingTitle_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.title", "Marketing Cookies"));
            $this->set("preferencesModalSectionMarketingDescription_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.description", "These cookies allow the website to remember the choices you have made in the past."));
            $this->set("preferencesModalSectionMarketingCaption_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.caption", "List of Cookies"));
            $this->set("preferencesModalSectionMarketingName_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.name", "Name"));
            $this->set("preferencesModalSectionMarketingDomain_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.domain", "Domain"));
            $this->set("preferencesModalSectionMarketingDuration_" . $languageCode, $this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.headers.duration", "Duration"));
            $this->set("preferencesModalSectionMarketingBody_" . $languageCode, (array)$this->siteConfig->get("simple_cookie_banner.config.language.translations.$languageCode.preferences_modal.sections.marketing.cookie_table.body", []));
        }
    }
}