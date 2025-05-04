<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Form\Service\Form;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Validation\CSRF\Token;
use Concrete\Core\Form\Service\Widget\Color;
use Concrete\Core\Application\Service\UserInterface;
use Concrete\Core\View\View;

/** @var array $modes */
/** @var array $cssColorSchemes */
/** @var array $siteTypes */
/** @var array $consentModalLayouts */
/** @var array $consentModalPositions */
/** @var array $preferencesModalLayouts */
/** @var array $preferencesModalPositions */

/** @var string $cssFontFamily */
/** @var string $cssModalTransitionDuration */
/** @var string $cssLinkColor */
/** @var string $cssModalMargin */
/** @var string $cssZIndex */
/** @var string $cssBtnPrimaryBorderColor */
/** @var string $cssBtnPrimaryHoverBorderColor */
/** @var string $cssBtnSecondaryBorderColor */
/** @var string $cssBtnSecondaryHoverBorderColor */
/** @var string $cssToggleOnBg */
/** @var string $cssToggleOffKnobBg */
/** @var string $cssToggleEnabledIconColor */
/** @var string $cssToggleDisabledIconColor */
/** @var string $cssToggleReadonlyKnobIconColor */
/** @var string $cssSectionCategoryBorder */
/** @var string $cssWebkitScrollbarBg */
/** @var string $cssWebkitScrollbarHoverBg */
/** @var string $cssFooterColor */
/** @var int $privacyPageId */
/** @var string $cssColorScheme */
/** @var string $cssBg */
/** @var string $cssPrimaryColor */
/** @var string $cssSecondaryColor */
/** @var string $cssBtnPrimaryBg */
/** @var string $cssBtnPrimaryColor */
/** @var string $cssBtnPrimaryHoverBg */
/** @var string $cssBtnPrimaryHoverColor */
/** @var string $cssBtnSecondaryBg */
/** @var string $cssBtnSecondaryColor */
/** @var string $cssBtnSecondaryHoverBg */
/** @var string $cssBtnSecondaryHoverColor */
/** @var string $cssCookieCategoryBlockBg */
/** @var string $cssCookieCategoryBlockBorder */
/** @var string $cssCookieCategoryBlockHoverBg */
/** @var string $cssCookieCategoryBlockHoverBorder */
/** @var string $cssCookieCategoryBlockExpandedBlockHoverBg */
/** @var string $cssCookieCategoryBlockExpandedBlockBg */
/** @var string $cssOverlayBg */
/** @var string $cssToggleReadonlyBg */
/** @var string $cssToggleOnKnobBg */
/** @var string $cssToggleOffBg */
/** @var string $cssToggleReadonlyKnobBg */
/** @var string $cssSeparatorBorderColor */
/** @var string $cssFooterBorderColor */
/** @var string $cssFooterBorderBg */
/** @var string $cssBtnBorderRadius */
/** @var string $cssModalBorderRadius */
/** @var string $cssPmToggleBorderRadius */
/** @var string $mode */
/** @var bool $autoShow */
/** @var bool $manageScriptTags */
/** @var bool $autoClearCookies */
/** @var bool $hideFromBots */
/** @var bool $disablePageInteraction */
/** @var bool $lazyHtmlGeneration */
/** @var string $cookieName */
/** @var string $cookiePath */
/** @var int $cookieExpiresAfterDays */
/** @var string $cookieSameSite */
/** @var bool $cookieUseLocalStorage */
/** @var string $consentModalLayout */
/** @var string $consentModalPosition */
/** @var bool $consentModalFlipButtons */
/** @var bool $consentModalEqualWeightButtons */
/** @var string $preferencesModalLayout */
/** @var string $preferencesModalPosition */
/** @var bool $preferencesModalFlipButtons */
/** @var bool $preferencesModalEqualWeightButtons */
/** @var bool $categoryAnalyticsEnabled */
/** @var bool $categoryMarketingEnabled */

$app = Application::getFacadeApplication();
/** @var Form $form */
/** @noinspection PhpUnhandledExceptionInspection */
$form = $app->make(Form::class);
/** @var Token $token */
/** @noinspection PhpUnhandledExceptionInspection */
$token = $app->make(Token::class);
/** @var PageSelector $pageSelector */
/** @noinspection PhpUnhandledExceptionInspection */
$pageSelector = $app->make(PageSelector::class);
/** @var Color $colorPicker */
/** @noinspection PhpUnhandledExceptionInspection */
$colorPicker = $app->make(Color::class);
/** @var UserInterface $ui */
/** @noinspection PhpUnhandledExceptionInspection */
$ui = $app->make(UserInterface::class);

?>

<div class="ccm-dashboard-header-buttons">
    <?php
    /** @noinspection PhpUnhandledExceptionInspection */
    View::element("dashboard/help", [], "simple_cookie_banner");
    ?>
</div>

<?php View::element("dashboard/did_you_know", [], "simple_cookie_banner"); ?>

<form action="#" method="post">
    <?php echo $token->output("update_settings"); ?>

    <?php echo $ui->tabs([
        ['options', t('Options'), true],
        ['styling', t('Styling'), false]
    ]); ?>

    <div class="tab-content">
        <div class="tab-pane active" id="options" role="tabpanel">
            <fieldset>
                <legend>
                    <?php echo t("General"); ?>
                </legend>

                <div class="form-group">
                    <?php echo $form->label("privacyPageId", t("Privacy Page")); ?>
                    <?php echo $pageSelector->selectPage("privacyPageId", $privacyPageId); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("mode", "Mode"); ?>
                    <?php echo $form->select("mode", $modes, $mode); ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <?php echo $form->checkbox("autoShow", 1, $autoShow); ?>
                        <?php echo $form->label("autoShow", "Auto Show"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("manageScriptTags", 1, $manageScriptTags); ?>
                        <?php echo $form->label("manageScriptTags", "Manage Script Tags"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("autoClearCookies", 1, $autoClearCookies); ?>
                        <?php echo $form->label("autoClearCookies", "Auto Clear Cookies"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("hideFromBots", 1, $hideFromBots); ?>
                        <?php echo $form->label("hideFromBots", "Hide From Bots"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("disablePageInteraction", 1, $disablePageInteraction); ?>
                        <?php echo $form->label("disablePageInteraction", "Disable Page Interaction"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("lazyHtmlGeneration", 1, $lazyHtmlGeneration); ?>
                        <?php echo $form->label("lazyHtmlGeneration", "Lazy HTML Generation"); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <?php echo t("Cookie"); ?>
                </legend>

                <div class="form-group">
                    <?php echo $form->label("cookieName", "Name"); ?>
                    <?php echo $form->text("cookieName", $cookieName); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cookiePath", "Path"); ?>
                    <?php echo $form->text("cookiePath", $cookiePath); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cookieExpiresAfterDays", "Expires After Days"); ?>
                    <?php echo $form->number("cookieExpiresAfterDays", $cookieExpiresAfterDays); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cookieSameSite", "Same Site"); ?>
                    <?php echo $form->select("cookieSameSite", $siteTypes, $cookieSameSite); ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <?php echo $form->checkbox("cookieUseLocalStorage", 1, $cookieUseLocalStorage); ?>
                        <?php echo $form->label("cookieUseLocalStorage", "Use Local Storage"); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <?php echo t("Consent Modal"); ?>
                </legend>

                <div class="form-group">
                    <?php echo $form->label("consentModalLayout", "Layout"); ?>
                    <?php echo $form->select("consentModalLayout", $consentModalLayouts, $consentModalLayout); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("consentModalPosition", "Position"); ?>
                    <?php echo $form->select("consentModalPosition", $consentModalPositions, $consentModalPosition); ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <?php echo $form->checkbox("consentModalFlipButtons", 1, $consentModalFlipButtons); ?>
                        <?php echo $form->label("consentModalFlipButtons", "Flip Buttons"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("consentModalEqualWeightButtons", 1, $consentModalEqualWeightButtons); ?>
                        <?php echo $form->label("consentModalEqualWeightButtons", "Equal Weight Buttons"); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <?php echo t("Preferences Modal"); ?>
                </legend>

                <div class="form-group">
                    <?php echo $form->label("preferencesModalLayout", "Layout"); ?>
                    <?php echo $form->select("preferencesModalLayout", $preferencesModalLayouts, $preferencesModalLayout); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("preferencesModalPosition", "Position"); ?>
                    <?php echo $form->select("preferencesModalPosition", $preferencesModalPositions, $preferencesModalPosition); ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <?php echo $form->checkbox("preferencesModalFlipButtons", 1, $preferencesModalFlipButtons); ?>
                        <?php echo $form->label("preferencesModalFlipButtons", "Flip Buttons"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("preferencesModalEqualWeightButtons", 1, $preferencesModalEqualWeightButtons); ?>
                        <?php echo $form->label("preferencesModalEqualWeightButtons", "Equal Weight Buttons"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("categoryAnalyticsEnabled", 1, $categoryAnalyticsEnabled); ?>
                        <?php echo $form->label("categoryAnalyticsEnabled", "Analytics Category Enabled"); ?>
                    </div>

                    <div class="form-check">
                        <?php echo $form->checkbox("categoryMarketingEnabled", 1, $categoryMarketingEnabled); ?>
                        <?php echo $form->label("categoryMarketingEnabled", "Marketing Category Enabled"); ?>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="tab-pane" id="styling" role="tabpanel">
            <section>
                <h3>
                    <?php echo t("General"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssColorScheme", "Color Scheme"); ?>
                    <?php echo $form->select("cssColorScheme", $cssColorSchemes, $cssColorScheme); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssFontFamily", "Font Family"); ?>
                    <?php echo $form->text("cssFontFamily", $cssFontFamily); ?>
                </div>


                <div class="form-group">
                    <?php echo $form->label("cssModalTransitionDuration", "Transition Duration"); ?>
                    <?php echo $form->text("cssModalTransitionDuration", $cssModalTransitionDuration); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssModalMargin", "Margin"); ?>
                    <?php echo $form->text("cssModalMargin", $cssModalMargin); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssZIndex", "z-Index"); ?>
                    <?php echo $form->text("cssZIndex", $cssZIndex); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssLinkColor", t("Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssLinkColor", $cssLinkColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssPrimaryColor", t("Primary Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssPrimaryColor", $cssPrimaryColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssSecondaryColor", t("Secondary Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssSecondaryColor", $cssSecondaryColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBg", t("Background Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssBg", $cssBg); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Primary Button"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryBg", t("Background Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryBg", $cssBtnPrimaryBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryBorderColor", t("Border Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryBorderColor", $cssBtnPrimaryBorderColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryColor", t("Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryColor", $cssBtnPrimaryColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryHoverBorderColor", t("Border Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryHoverBorderColor", $cssBtnPrimaryHoverBorderColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryHoverBg", t("Background Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryHoverBg", $cssBtnPrimaryHoverBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnPrimaryHoverColor", t("Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnPrimaryHoverColor", $cssBtnPrimaryHoverColor); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Secondary Button"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryBg", t("Background Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryBg", $cssBtnSecondaryBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryBorderColor", t("Border Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryBorderColor", $cssBtnSecondaryBorderColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryColor", t("Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryColor", $cssBtnSecondaryColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryHoverBg", t("Background Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryHoverBg", $cssBtnSecondaryHoverBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryHoverBorderColor", t("Border Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryHoverBorderColor", $cssBtnSecondaryHoverBorderColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssBtnSecondaryHoverColor", t("Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssBtnSecondaryHoverColor", $cssBtnSecondaryHoverColor); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Category Block"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockBg", t("Background Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockBg", $cssCookieCategoryBlockBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssSectionCategoryBorder", t("Border Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssSectionCategoryBorder", $cssSectionCategoryBorder); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockBorder", t("Border Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockBorder", $cssCookieCategoryBlockBorder); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockHoverBg", t("Background Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockHoverBg", $cssCookieCategoryBlockHoverBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockHoverBorder", t("Border Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockHoverBorder", $cssCookieCategoryBlockHoverBorder); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Category Block (Expanded)"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockExpandedBlockBg", t("Background Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockExpandedBlockBg", $cssCookieCategoryBlockExpandedBlockBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssCookieCategoryBlockExpandedBlockHoverBg", t("Background Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssCookieCategoryBlockExpandedBlockHoverBg", $cssCookieCategoryBlockExpandedBlockHoverBg); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Overlay"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssOverlayBg", t("Background Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssOverlayBg", $cssOverlayBg); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Toggle"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssToggleReadonlyBg", t("Background Color (Readonly State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleReadonlyBg", $cssToggleReadonlyBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleReadonlyKnobBg", t("Knob Background Color (Readonly State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleReadonlyKnobBg", $cssToggleReadonlyKnobBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleReadonlyKnobIconColor", t("Icon Color (Readonly State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleReadonlyKnobIconColor", $cssToggleReadonlyKnobIconColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleOnKnobBg", t("Knob Background Color (On State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleOnKnobBg", $cssToggleOnKnobBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleOnBg", t("Knob Background Color (On State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleOnBg", $cssToggleOnBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleEnabledIconColor", t("Icon Color (On State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleEnabledIconColor", $cssToggleEnabledIconColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleOffKnobBg", t("Know Background Color (Off State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleOffKnobBg", $cssToggleOffKnobBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleOffBg", t("Background Color (Off State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleOffBg", $cssToggleOffBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssToggleDisabledIconColor", t("Icon Color (Off State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssToggleDisabledIconColor", $cssToggleDisabledIconColor); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Separator"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssSeparatorBorderColor", t("Border Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssSeparatorBorderColor", $cssSeparatorBorderColor); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Footer"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssFooterBorderColor", t("Border Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssFooterBorderColor", $cssFooterBorderColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssFooterColor", t("Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssFooterColor", $cssFooterColor); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssFooterBorderBg", t("Background Color")); ?>

                    <div>
                        <?php $colorPicker->output("cssFooterBorderBg", $cssFooterBorderBg); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Scrollbar"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssWebkitScrollbarBg", t("Background Color (Regular State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssWebkitScrollbarBg", $cssWebkitScrollbarBg); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->label("cssWebkitScrollbarHoverBg", t("Background Color (Active State)")); ?>

                    <div>
                        <?php $colorPicker->output("cssWebkitScrollbarHoverBg", $cssWebkitScrollbarHoverBg); ?>
                    </div>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Buttons"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssBtnBorderRadius", "Border Radius"); ?>
                    <?php echo $form->text("cssBtnBorderRadius", $cssBtnBorderRadius); ?>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Modals"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssModalBorderRadius", "Border Radius"); ?>
                    <?php echo $form->text("cssModalBorderRadius", $cssModalBorderRadius); ?>
                </div>
            </section>

            <hr class="mt-5 mb-4">

            <section>
                <h3>
                    <?php echo t("Pm Toggle"); ?>
                </h3>

                <div class="form-group">
                    <?php echo $form->label("cssPmToggleBorderRadius", "Border Radius"); ?>
                    <?php echo $form->text("cssPmToggleBorderRadius", $cssPmToggleBorderRadius); ?>
                </div>
            </section>
        </div>
    </div>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php echo $form->submit('save', t('Save'), ['class' => 'btn btn-primary float-end']); ?>
        </div>
    </div>
</form>
