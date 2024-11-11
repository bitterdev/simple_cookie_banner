<?php

namespace Concrete\Package\SimpleCookieBanner\Controller\SinglePage\Dashboard\SimpleCookieBanner;

use Concrete\Core\Site\Config\Liaison;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Validation;
use Concrete\Core\Page\Controller\DashboardSitePageController;

class Settings extends DashboardSitePageController
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
        if ($this->request->getMethod() === "POST") {
            $this->formValidator->setData($this->request->request->all());
            $this->formValidator->addRequiredToken("update_settings");

            if ($this->formValidator->test()) {
                $this->siteConfig->save("simple_cookie_banner.privacy_page_id", (int)$this->request->request->get("privacyPageId"));
                $this->siteConfig->save("simple_cookie_banner.privacy_page_id", (int)$this->request->request->get("privacyPageId"));
                $this->siteConfig->save("simple_cookie_banner.css.color_scheme", $this->request->request->get("cssColorScheme"));
                $this->siteConfig->save("simple_cookie_banner.css.bg", $this->request->request->get("cssBg"));
                $this->siteConfig->save("simple_cookie_banner.css.primary_color", $this->request->request->get("cssPrimaryColor"));
                $this->siteConfig->save("simple_cookie_banner.css.secondary_color", $this->request->request->get("cssSecondaryColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_bg", $this->request->request->get("cssBtnPrimaryBg"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_color", $this->request->request->get("cssBtnPrimaryColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_hover_bg", $this->request->request->get("cssBtnPrimaryHoverBg"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_hover_color", $this->request->request->get("cssBtnPrimaryHoverColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_bg", $this->request->request->get("cssBtnSecondaryBg"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_color", $this->request->request->get("cssBtnSecondaryColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_hover_bg", $this->request->request->get("cssBtnSecondaryHoverBg"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_hover_color", $this->request->request->get("cssBtnSecondaryHoverColor"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_block_bg", $this->request->request->get("cssCookieCategoryBlockBg"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_block_border", $this->request->request->get("cssCookieCategoryBlockBorder"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_block_hover_bg", $this->request->request->get("cssCookieCategoryBlockHoverBg"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_block_hover_border", $this->request->request->get("cssCookieCategoryBlockHoverBorder"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_expanded_block_hover_bg", $this->request->request->get("cssCookieCategoryBlockExpandedBlockHoverBg"));
                $this->siteConfig->save("simple_cookie_banner.css.cookie_category_expanded_block_bg", $this->request->request->get("cssCookieCategoryBlockExpandedBlockBg"));
                $this->siteConfig->save("simple_cookie_banner.css.overlay_bg", $this->request->request->get("cssOverlayBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_readonly_bg", $this->request->request->get("cssToggleReadonlyBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_on_knob_bg", $this->request->request->get("cssToggleOnKnobBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_off_bg", $this->request->request->get("cssToggleOffBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_readonly_knob_bg", $this->request->request->get("cssToggleReadonlyKnobBg"));
                $this->siteConfig->save("simple_cookie_banner.css.separator_border_color", $this->request->request->get("cssSeparatorBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.footer_border_color", $this->request->request->get("cssFooterBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.footer_bg", $this->request->request->get("cssFooterBorderBg"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_border_radius", $this->request->request->get("cssBtnBorderRadius"));
                $this->siteConfig->save("simple_cookie_banner.css.modal_border_radius", $this->request->request->get("cssModalBorderRadius"));
                $this->siteConfig->save("simple_cookie_banner.css.pm_toggle_border_radius", $this->request->request->get("cssPmToggleBorderRadius"));
                $this->siteConfig->save("simple_cookie_banner.config.mode", $this->request->request->get("mode"));
                $this->siteConfig->save("simple_cookie_banner.config.auto_show", $this->request->request->has("autoShow"));
                $this->siteConfig->save("simple_cookie_banner.config.manage_script_tags", $this->request->request->has("manageScriptTags"));
                $this->siteConfig->save("simple_cookie_banner.config.auto_clear_cookies", $this->request->request->has("autoClearCookies"));
                $this->siteConfig->save("simple_cookie_banner.config.hide_from_bots", $this->request->request->has("hideFromBots"));
                $this->siteConfig->save("simple_cookie_banner.config.disable_page_interaction", $this->request->request->has("disablePageInteraction"));
                $this->siteConfig->save("simple_cookie_banner.config.lazy_html_generation", $this->request->request->has("lazyHtmlGeneration"));
                $this->siteConfig->save("simple_cookie_banner.config.cookie.name", $this->request->request->get("cookieName"));
                $this->siteConfig->save("simple_cookie_banner.config.cookie.path", $this->request->request->get("cookiePath"));
                $this->siteConfig->save("simple_cookie_banner.config.cookie.expires_after_days", (int)$this->request->request->get("cookieExpiresAfterDays"));
                $this->siteConfig->save("simple_cookie_banner.config.cookie.same_site", $this->request->request->get("cookieSameSite"));
                $this->siteConfig->save("simple_cookie_banner.config.cookie.use_local_storage", $this->request->request->has("cookieUseLocalStorage"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.consent_modal.layout", $this->request->request->get("consentModalLayout"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.consent_modal.position", $this->request->request->get("consentModalPosition"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.consent_modal.flip_buttons", $this->request->request->has("consentModalFlipButtons"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.consent_modal.equal_weight_buttons", $this->request->request->has("consentModalEqualWeightButtons"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.preferences_modal.layout", $this->request->request->get("preferencesModalLayout"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.preferences_modal.position", $this->request->request->get("preferencesModalPosition"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.preferences_modal.flip_buttons", $this->request->request->has("preferencesModalFlipButtons"));
                $this->siteConfig->save("simple_cookie_banner.config.gui_options.preferences_modal.equal_weight_buttons", $this->request->request->has("preferencesModalEqualWeightButtons"));
                $this->siteConfig->save("simple_cookie_banner.config.categories.analytics.enabled", $this->request->request->has("categoryAnalyticsEnabled"));
                $this->siteConfig->save("simple_cookie_banner.config.categories.marketing.enabled", $this->request->request->has("categoryMarketingEnabled"));
                $this->siteConfig->save("simple_cookie_banner.css.font_family", $this->request->request->get("cssFontFamily"));
                $this->siteConfig->save("simple_cookie_banner.css.modal_transition_duration", $this->request->request->get("cssModalTransitionDuration"));
                $this->siteConfig->save("simple_cookie_banner.css.link_color", $this->request->request->get("cssLinkColor"));
                $this->siteConfig->save("simple_cookie_banner.css.modal_margin", $this->request->request->get("cssModalMargin"));
                $this->siteConfig->save("simple_cookie_banner.css.z_index", $this->request->request->get("cssZIndex"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_border_color", $this->request->request->get("cssBtnPrimaryBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_primary_hover_border_color", $this->request->request->get("cssBtnPrimaryHoverBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_border_color", $this->request->request->get("cssBtnSecondaryBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.btn_secondary_hover_border_color", $this->request->request->get("cssBtnSecondaryHoverBorderColor"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_on_bg", $this->request->request->get("cssToggleOnBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_off_knob_bg", $this->request->request->get("cssToggleOffKnobBg"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_enabled_icon_color", $this->request->request->get("cssToggleEnabledIconColor"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_disabled_icon_color", $this->request->request->get("cssToggleDisabledIconColor"));
                $this->siteConfig->save("simple_cookie_banner.css.toggle_readonly_knob_icon_color", $this->request->request->get("cssToggleReadonlyKnobIconColor"));
                $this->siteConfig->save("simple_cookie_banner.css.section_category_border", $this->request->request->get("cssSectionCategoryBorder"));
                $this->siteConfig->save("simple_cookie_banner.css.scrollbar_bg", $this->request->request->get("cssWebkitScrollbarBg"));
                $this->siteConfig->save("simple_cookie_banner.css.scrollbar_hover_bg", $this->request->request->get("cssWebkitScrollbarHoverBg"));
                $this->siteConfig->save("simple_cookie_banner.css.footer_color", $this->request->request->get("cssFooterColor"));

                $this->set("success", t("The settings has been successfully updated."));
            } else {
                /** @var ErrorList $errorList */
                $errorList = $this->formValidator->getError();

                foreach ($errorList->getList() as $error) {
                    $this->error->add($error);
                }
            }
        }

        $consentModalLayouts = [
            "box" => t("Box"),
            "box inline" => t("Box (Inline)"),
            "box wide" => t("Box (Wide)"),
            "cloud" => t("Cloud"),
            "cloud inline" => t("Cloud (Inline)"),
            "bar" => t("Bar"),
            "bar inline" => t("Bar (Inline)")
        ];

        $consentModalPositions = [
            "top" => t("Top"),
            "bottom" => t("Bottom")
        ];

        $preferencesModalLayouts = [
            "box" => t("Box"),
            "bar" => t("Bar"),
            "bar wide" => t("Bar (Wide)")
        ];

        $preferencesModalPositions = [
            "right" => t("Right"),
            "left" => t("Left")
        ];

        $cssColorSchemes = [
            "dark" => t("Dark"),
            "light" => t("Light")
        ];

        $siteTypes = [
            "lax" => t("Lax"),
            "strict" => t("Strict")
        ];

        $modes = [
            'opt-in' => t("Opt In"),
            'opt-out' => t("Opt Out")
        ];

        $this->set("modes", $modes);
        $this->set("siteTypes", $siteTypes);
        $this->set("cssColorSchemes", $cssColorSchemes);
        $this->set("consentModalLayouts", $consentModalLayouts);
        $this->set("consentModalPositions", $consentModalPositions);
        $this->set("preferencesModalLayouts", $preferencesModalLayouts);
        $this->set("preferencesModalPositions", $preferencesModalPositions);
        $this->set("privacyPageId", (int)$this->siteConfig->get("simple_cookie_banner.privacy_page_id"));
        $this->set("cssColorScheme", $this->siteConfig->get("simple_cookie_banner.css.color_scheme", "light"));
        $this->set("cssBg", $this->siteConfig->get("simple_cookie_banner.css.bg", "#f9faff"));
        $this->set("cssPrimaryColor", $this->siteConfig->get("simple_cookie_banner.css.primary_color", "#112954"));
        $this->set("cssSecondaryColor", $this->siteConfig->get("simple_cookie_banner.css.secondary_color", "#112954"));
        $this->set("cssBtnPrimaryBg", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_bg", "#3859d0"));
        $this->set("cssBtnPrimaryColor", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_color", "#f9faff"));
        $this->set("cssBtnPrimaryHoverBg", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_bg", "#213657"));
        $this->set("cssBtnPrimaryHoverColor", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_color", "#fff"));
        $this->set("cssBtnSecondaryBg", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_bg", "#3859d0"));
        $this->set("cssBtnSecondaryColor", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_color", "#f9faff"));
        $this->set("cssBtnSecondaryHoverBg", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_bg", "#213657"));
        $this->set("cssBtnSecondaryHoverColor", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_color", "#fff"));
        $this->set("cssCookieCategoryBlockBg", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_bg", "#ebeff9"));
        $this->set("cssCookieCategoryBlockBorder", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_border", "#ebeff9"));
        $this->set("cssCookieCategoryBlockHoverBg", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_hover_bg", "#dbe5f9"));
        $this->set("cssCookieCategoryBlockHoverBorder", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_block_hover_border", "#dbe5f9"));
        $this->set("cssCookieCategoryBlockExpandedBlockHoverBg", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_expanded_block_hover_bg", "#ebeff9"));
        $this->set("cssCookieCategoryBlockExpandedBlockBg", $this->siteConfig->get("simple_cookie_banner.css.cookie_category_expanded_block_bg", "#ebeff9"));
        $this->set("cssOverlayBg", $this->siteConfig->get("simple_cookie_banner.css.overlay_bg", "rgba(219, 232, 255, 0.85)"));
        $this->set("cssToggleReadonlyBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_bg", "#cbd8f1"));
        $this->set("cssToggleOnKnobBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_on_knob_bg", "#f9faff"));
        $this->set("cssToggleOffBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_off_bg", "#8fa8d6"));
        $this->set("cssToggleReadonlyKnobBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_knob_bg", "#f9faff"));
        $this->set("cssSeparatorBorderColor", $this->siteConfig->get("simple_cookie_banner.css.separator_border_color", "#f1f3f5"));
        $this->set("cssFooterBorderColor", $this->siteConfig->get("simple_cookie_banner.css.footer_border_color", "#f1f3f5"));
        $this->set("cssFooterBorderBg", $this->siteConfig->get("simple_cookie_banner.css.footer_bg", "#f9faff"));
        $this->set("cssBtnBorderRadius", $this->siteConfig->get("simple_cookie_banner.css.btn_border_radius", ".4rem"));
        $this->set("cssModalBorderRadius", $this->siteConfig->get("simple_cookie_banner.css.modal_border_radius", ".5rem"));
        $this->set("cssPmToggleBorderRadius", $this->siteConfig->get("simple_cookie_banner.css.pm_toggle_border_radius", "1rem"));
        $this->set("mode", $this->siteConfig->get("simple_cookie_banner.config.mode", "opt-in"));
        $this->set("autoShow", (bool)$this->siteConfig->get("simple_cookie_banner.config.auto_show", true));
        $this->set("manageScriptTags", (bool)$this->siteConfig->get("simple_cookie_banner.config.manage_script_tags", true));
        $this->set("autoClearCookies", (bool)$this->siteConfig->get("simple_cookie_banner.config.auto_clear_cookies", true));
        $this->set("hideFromBots", (bool)$this->siteConfig->get("simple_cookie_banner.config.hide_from_bots", true));
        $this->set("disablePageInteraction", (bool)$this->siteConfig->get("simple_cookie_banner.config.disable_page_interaction", false));
        $this->set("lazyHtmlGeneration", (bool)$this->siteConfig->get("simple_cookie_banner.config.lazy_html_generation", true));
        $this->set("cookieName", $this->siteConfig->get("simple_cookie_banner.config.cookie.name", "cc_cookie"));
        $this->set("cookiePath", $this->siteConfig->get("simple_cookie_banner.config.cookie.path", "/"));
        $this->set("cookieExpiresAfterDays", (int)$this->siteConfig->get("simple_cookie_banner.config.cookie.expires_after_days", 182));
        $this->set("cookieSameSite", $this->siteConfig->get("simple_cookie_banner.config.cookie.same_site", "Lax"));
        $this->set("cookieUseLocalStorage", (bool)$this->siteConfig->get("simple_cookie_banner.config.cookie.use_local_storage", false));
        $this->set("consentModalLayout", $this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.layout", "box"));
        $this->set("consentModalPosition", $this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.position", "bottom right"));
        $this->set("consentModalFlipButtons", (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.flip_buttons", false));
        $this->set("consentModalEqualWeightButtons", (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.consent_modal.equal_weight_buttons", true));
        $this->set("preferencesModalLayout", $this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.layout", "box"));
        $this->set("preferencesModalPosition", $this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.position", "right"));
        $this->set("preferencesModalFlipButtons", (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.flip_buttons", false));
        $this->set("preferencesModalEqualWeightButtons", (bool)$this->siteConfig->get("simple_cookie_banner.config.gui_options.preferences_modal.equal_weight_buttons", true));
        $this->set("categoryAnalyticsEnabled", (bool)$this->siteConfig->get("simple_cookie_banner.config.categories.analytics.enabled", true));
        $this->set("categoryMarketingEnabled", (bool)$this->siteConfig->get("simple_cookie_banner.config.categories.marketing.enabled", true));
        $this->set("cssFontFamily", $this->siteConfig->get("simple_cookie_banner.css.font_family", "-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\""));
        $this->set("cssModalTransitionDuration", $this->siteConfig->get("simple_cookie_banner.css.modal_transition_duration", ".25s"));
        $this->set("cssLinkColor", $this->siteConfig->get("simple_cookie_banner.css.link_color", "#3859d0"));
        $this->set("cssModalMargin", $this->siteConfig->get("simple_cookie_banner.css.modal_margin", "1rem"));
        $this->set("cssZIndex", $this->siteConfig->get("simple_cookie_banner.css.z_index", "2147483647"));
        $this->set("cssBtnPrimaryBorderColor", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_border_color", "#3859d0"));
        $this->set("cssBtnPrimaryHoverBorderColor", $this->siteConfig->get("simple_cookie_banner.css.btn_primary_hover_border_color", "#213657"));
        $this->set("cssBtnSecondaryBorderColor", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_border_color", "#3859d0"));
        $this->set("cssBtnSecondaryHoverBorderColor", $this->siteConfig->get("simple_cookie_banner.css.btn_secondary_hover_border_color", "#d4dae0"));
        $this->set("cssToggleOnBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_on_bg", "#3859d0"));
        $this->set("cssToggleOffKnobBg", $this->siteConfig->get("simple_cookie_banner.css.toggle_off_knob_bg", "#f9faff"));
        $this->set("cssToggleEnabledIconColor", $this->siteConfig->get("simple_cookie_banner.css.toggle_enabled_icon_color", "#f9faff"));
        $this->set("cssToggleDisabledIconColor", $this->siteConfig->get("simple_cookie_banner.css.toggle_disabled_icon_color", "#f9faff"));
        $this->set("cssToggleReadonlyKnobIconColor", $this->siteConfig->get("simple_cookie_banner.css.toggle_readonly_knob_icon_color", "#cbd8f1"));
        $this->set("cssSectionCategoryBorder", $this->siteConfig->get("simple_cookie_banner.css.section_category_border", "#ebeff9"));
        $this->set("cssWebkitScrollbarBg", $this->siteConfig->get("simple_cookie_banner.css.scrollbar_bg", "#ebeff9"));
        $this->set("cssWebkitScrollbarHoverBg", $this->siteConfig->get("simple_cookie_banner.css.scrollbar_hover_bg", "#213657"));
        $this->set("cssFooterColor", $this->siteConfig->get("simple_cookie_banner.css.footer_color", "#112954"));
    }
}