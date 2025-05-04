<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Form\Service\Form;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Validation\CSRF\Token;
use Concrete\Core\Form\Service\Widget\Color;
use Concrete\Core\Application\Service\UserInterface;
use Concrete\Core\View\View;
use Concrete\Package\SimpleCookieBanner\Controller\SinglePage\Dashboard\SimpleCookieBanner\Content;

/** @var array $languages */
/** @var Content $controller */

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

$tabNav = [];

foreach ($languages as $languageCode => $languageName) {
    $tabNav[] = [$languageCode, $languageName, count($tabNav) === 0];
}
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

    <?php echo $ui->tabs($tabNav); ?>

    <div class="tab-content">
        <?php foreach ($languages as $languageCode => $languageName) { ?>
            <div class="tab-pane <?php echo array_key_first($languages) === $languageCode ? " active" : "" ?>"
                 id="<?php echo h($languageCode); ?>" role="tabpanel">
                <fieldset>
                    <legend>
                        <?php echo t("Consent Modal"); ?>
                    </legend>

                    <div class="form-group">
                        <?php echo $form->label("consentModalLabel_" . $languageCode, "Label"); ?>
                        <?php echo $form->text("consentModalLabel_" . $languageCode, $controller->get('consentModalLabel_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalTitle_" . $languageCode, "Title"); ?>
                        <?php echo $form->text("consentModalTitle_" . $languageCode, $controller->get('consentModalTitle_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalDescription_" . $languageCode, "Description"); ?>
                        <?php echo $form->text("consentModalDescription_" . $languageCode, $controller->get('consentModalDescription_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalAcceptAllBtn_" . $languageCode, "Accept All Button"); ?>
                        <?php echo $form->text("consentModalAcceptAllBtn_" . $languageCode, $controller->get('consentModalAcceptAllBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalAcceptNecessaryBtn_" . $languageCode, "Accept Necessary Button"); ?>
                        <?php echo $form->text("consentModalAcceptNecessaryBtn_" . $languageCode, $controller->get('consentModalAcceptNecessaryBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalShowPreferencesBtn_" . $languageCode, "Save Preferences Button"); ?>
                        <?php echo $form->text("consentModalShowPreferencesBtn_" . $languageCode, $controller->get('consentModalShowPreferencesBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("consentModalFooter_" . $languageCode, "Footer"); ?>
                        <?php echo $form->text("consentModalFooter_" . $languageCode, $controller->get('consentModalFooter_' . $languageCode)); ?>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>
                        <?php echo t("Preferences Modal"); ?>
                    </legend>

                    <div class="form-group">
                        <?php echo $form->label("preferencesModalTitle_" . $languageCode, "Title"); ?>
                        <?php echo $form->text("preferencesModalTitle_" . $languageCode, $controller->get('preferencesModalTitle_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("preferencesModalAcceptAllBtn_" . $languageCode, "Accept All Button"); ?>
                        <?php echo $form->text("preferencesModalAcceptAllBtn_" . $languageCode, $controller->get('preferencesModalAcceptAllBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("preferencesModalAcceptNecessaryBtn_" . $languageCode, "Accept Necessary Button"); ?>
                        <?php echo $form->text("preferencesModalAcceptNecessaryBtn_" . $languageCode, $controller->get('preferencesModalAcceptNecessaryBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("preferencesModalSavePreferencesBtn_" . $languageCode, "Save Preferences Button"); ?>
                        <?php echo $form->text("preferencesModalSavePreferencesBtn_" . $languageCode, $controller->get('preferencesModalSavePreferencesBtn_' . $languageCode)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->label("preferencesModalCloseIconLabel_" . $languageCode, "Close Icon Label"); ?>
                        <?php echo $form->text("preferencesModalCloseIconLabel_" . $languageCode, $controller->get('preferencesModalCloseIconLabel_' . $languageCode)); ?>
                    </div>

                    <hr class="mt-5 mb-4">

                    <section>
                        <h3>
                            <?php echo t("Section Necessary"); ?>
                        </h3>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionNecessaryTitle_" . $languageCode, "Title"); ?>
                            <?php echo $form->text("preferencesModalSectionNecessaryTitle_" . $languageCode, $controller->get('preferencesModalSectionNecessaryTitle_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionNecessaryDescription_" . $languageCode, "Description"); ?>
                            <?php echo $form->text("preferencesModalSectionNecessaryDescription_" . $languageCode, $controller->get('preferencesModalSectionNecessaryDescription_' . $languageCode)); ?>
                        </div>
                    </section>

                    <hr class="mt-5 mb-4">

                    <section>
                        <h3>
                            <?php echo t("Section Analytics"); ?>
                        </h3>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsTitle_" . $languageCode, "Title"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsTitle_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsTitle_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsDescription_" . $languageCode, "Description"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsDescription_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsDescription_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsCookieTableCaption_" . $languageCode, "Caption"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsCookieTableCaption_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsCookieTableCaption_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsCookieTableName_" . $languageCode, "Name"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsCookieTableName_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsCookieTableName_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsCookieTableDomain_" . $languageCode, "Domain"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsCookieTableDomain_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsCookieTableDomain_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsCookieTableDescription_" . $languageCode, "Description"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsCookieTableDescription_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsCookieTableDescription_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionAnalyticsCookieTableDuration_" . $languageCode, "Duration"); ?>
                            <?php echo $form->text("preferencesModalSectionAnalyticsCookieTableDuration_" . $languageCode, $controller->get('preferencesModalSectionAnalyticsCookieTableDuration_' . $languageCode)); ?>
                        </div>
                    </section>

                    <hr class="mt-5 mb-4">

                    <section>
                        <h3>
                            <?php echo t("Analytics Cookies"); ?>
                        </h3>

                        <div class="cookie-table" data-input-name="preferencesModalSectionAnalyticsCookieTableBody"
                             data-language-code="<?php echo h($languageCode); ?>"
                             data-rows="<?php echo h(json_encode($controller->get('preferencesModalSectionAnalyticsCookieTableBody_' . $languageCode))); ?>"></div>
                    </section>

                    <hr class="mt-5 mb-4">

                    <section>
                        <h3>
                            <?php echo t("Section Marketing"); ?>
                        </h3>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingTitle_" . $languageCode, "Title"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingTitle_" . $languageCode, $controller->get('preferencesModalSectionMarketingTitle_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingDescription_" . $languageCode, "Description"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingDescription_" . $languageCode, $controller->get('preferencesModalSectionMarketingDescription_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingCaption_" . $languageCode, "Caption"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingCaption_" . $languageCode, $controller->get('preferencesModalSectionMarketingCaption_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingName_" . $languageCode, "Name"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingName_" . $languageCode, $controller->get('preferencesModalSectionMarketingName_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingDomain_" . $languageCode, "Domain"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingDomain_" . $languageCode, $controller->get('preferencesModalSectionMarketingDomain_' . $languageCode)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label("preferencesModalSectionMarketingDuration_" . $languageCode, "Duration"); ?>
                            <?php echo $form->text("preferencesModalSectionMarketingDuration_" . $languageCode, $controller->get('preferencesModalSectionMarketingDuration_' . $languageCode)); ?>
                        </div>
                    </section>

                    <hr class="mt-5 mb-4">
                    <section>
                        <h3>
                            <?php echo t("Marketing Cookies"); ?>
                        </h3>

                        <div class="cookie-table" data-input-name="preferencesModalSectionMarketingBody"
                             data-language-code="<?php echo h($languageCode); ?>"
                             data-rows="<?php echo h(json_encode($controller->get('preferencesModalSectionMarketingBody_' . $languageCode))); ?>"></div>
                    </section>
                </fieldset>
            </div>
        <?php } ?>
    </div>

    <script id="ccm-table-entry" type="text/template">
        <div class="float-end">
            <a href="javascript:void(0);" class="add-row btn btn-secondary">
                <?php echo t("Add Cookie"); ?>
            </a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>
                    <?php echo t("Name"); ?>
                </th>

                <th>
                    <?php echo t("Domain"); ?>
                </th>

                <th>
                    <?php echo t("Description"); ?>
                </th>

                <th>
                    <?php echo t("Duration"); ?>
                </th>

                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>

            <tbody></tbody>
        </table>
    </script>

    <script id="ccm-table-row-entry" type="text/template">
        <tr>
            <td>
                <!--suppress HtmlFormInputWithoutLabel -->
                <input name="<%=inputName%>_<%=languageCode%>[<%=index%>][name]" value="<%=name%>"
                       class="form-control"/>
            </td>

            <td>
                <!--suppress HtmlFormInputWithoutLabel -->
                <input name="<%=inputName%>_<%=languageCode%>[<%=index%>][domain]" value="<%=domain%>"
                       class="form-control"/>
            </td>

            <td>
                <!--suppress HtmlFormInputWithoutLabel -->
                <input name="<%=inputName%>_<%=languageCode%>[<%=index%>][description]" value="<%=description%>"
                       class="form-control"/>
            </td>

            <td>
                <!--suppress HtmlFormInputWithoutLabel -->
                <input name="<%=inputName%>_<%=languageCode%>[<%=index%>][duration]" value="<%=duration%>"
                       class="form-control"/>
            </td>

            <td>
                <div class="float-end">
                    <a href="javascript:void(0);" class="btn btn-danger">
                        <?php echo t("Delete"); ?>
                    </a>
                </div>
            </td>
        </tr>
    </script>

    <script>
        (function ($) {
            $(function () {
                let nextInsertId = 0;

                let addRow = function ($container, row) {
                    let defaults = {
                        index: nextInsertId
                    };

                    let combinedData = {...defaults, ...row};
                    let $row = $(_.template($("#ccm-table-row-entry").html())(combinedData))

                    nextInsertId++;

                    $container.find("tbody").append($row);

                    $row.find(".btn-danger").on("click", function (e) {
                        e.stopPropagation();
                        e.preventDefault();

                        $row.remove();

                        return false;
                    });
                }

                $(".cookie-table").each(function () {
                    let $container = $(this);
                    let $table = $(_.template($("#ccm-table-entry").html())());
                    let rows = JSON.parse($container.attr("data-rows"));
                    let defaults = {
                        inputName: $container.attr("data-input-name"),
                        languageCode: $container.attr("data-language-code")
                    };

                    $container.append($table);

                    $container.find(".add-row").on("click", function (e) {
                        e.stopPropagation();
                        e.preventDefault();

                        addRow($container, {
                            inputName: $container.attr("data-input-name"),
                            languageCode: $container.attr("data-language-code"),
                            name: "",
                            domain: "",
                            description: "",
                            duration: ""
                        });

                        return false;
                    });

                    if (rows !== null) {
                        for (const key in rows) {
                            let row = rows[key];
                            addRow($container, {...defaults, ...row});
                        }
                    }
                });
            });
        })(jQuery);
    </script>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php echo $form->submit('save', t('Save'), ['class' => 'btn btn-primary float-end']); ?>
        </div>
    </div>
</form>
