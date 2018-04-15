<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\sidebarthemes;

use lukeyouell\sidebarthemes\models\Settings;
use lukeyouell\sidebarthemes\assetbundles\sidebarthemes\ThemesAsset;

use Craft;
use craft\web\View;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\helpers\UrlHelper;
use craft\events\PluginEvent;
use craft\events\TemplateEvent;

use yii\base\Event;

/**
 * Class SidebarThemes
 *
 * @author    Luke Youell
 * @package   SidebarThemes
 * @since     1.0.0
 *
 */
class SidebarThemes extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var SidebarThemes
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Fetch settings
        $settings = $this->getSettings();
        // Check theme isn't set to Craft
        $theme = $settings->theme !== 'craft' ? $settings->theme : null;

        // Require CP request
        if ((Craft::$app->getRequest()->getIsCpRequest()) and ($theme))
        {
            // Load theme css before template is rendered
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                function (TemplateEvent $event) {
                    // Get view
                    $view = Craft::$app->getView();
                    // Load CSS file
                    $view->registerAssetBundle(ThemesAsset::class);
                }
            );
        }

        // Redirect to settings after installation
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                  Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('settings/plugins/sidebar-themes'))->send();
                }
            }
        );

        // Redirect to settings after save
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_SAVE_PLUGIN_SETTINGS,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                  Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('settings/plugins/sidebar-themes'))->send();
                }
            }
        );
    }

    /**
     * @inheritdoc
     */
    public function getThemes()
    {
        $themes = [
            ['value' => 'craft', 'label' => Craft::t('sidebar-themes', 'Craft (default)')],
            ['value' => 'afterglow', 'label' => Craft::t('sidebar-themes', 'Afterglow')],
            ['value' => 'arc', 'label' => Craft::t('sidebar-themes', 'Arc')],
            ['value' => 'aubergine', 'label' => Craft::t('sidebar-themes', 'Aubergine')],
            ['value' => 'autumn', 'label' => Craft::t('sidebar-themes', 'Autumn')],
            ['value' => 'bigred', 'label' => Craft::t('sidebar-themes', 'Big Red')],
            ['value' => 'bolket', 'label' => Craft::t('sidebar-themes', 'Bolket')],
            ['value' => 'chocomint', 'label' => Craft::t('sidebar-themes', 'Choco Mint')],
            ['value' => 'citrus', 'label' => Craft::t('sidebar-themes', 'Citrus')],
            ['value' => 'cobalt', 'label' => Craft::t('sidebar-themes', 'Cobalt')],
            ['value' => 'codemash', 'label' => Craft::t('sidebar-themes', 'CodeMash')],
            ['value' => 'deepblue', 'label' => Craft::t('sidebar-themes', 'Deep Blue')],
            ['value' => 'dracula', 'label' => Craft::t('sidebar-themes', 'Dracula')],
            ['value' => 'facebook', 'label' => Craft::t('sidebar-themes', 'Facebook')],
            ['value' => 'hibari', 'label' => Craft::t('sidebar-themes', 'Hibari')],
            ['value' => 'laravel', 'label' => Craft::t('sidebar-themes', 'Laravel')],
            ['value' => 'linux', 'label' => Craft::t('sidebar-themes', 'Linux')],
            ['value' => 'material', 'label' => Craft::t('sidebar-themes', 'Material')],
            ['value' => 'monument', 'label' => Craft::t('sidebar-themes', 'Monument')],
            ['value' => 'ochin', 'label' => Craft::t('sidebar-themes', 'Ochin')],
            ['value' => 'purpledaydream', 'label' => Craft::t('sidebar-themes', 'Purple Daydream')],
            ['value' => 'smooch', 'label' => Craft::t('sidebar-themes', 'Smooch')],
            ['value' => 'snazzy', 'label' => Craft::t('sidebar-themes', 'Snazzy')],
            ['value' => 'spacegrey', 'label' => Craft::t('sidebar-themes', 'Space Grey')],
            ['value' => 'spotify', 'label' => Craft::t('sidebar-themes', 'Spotify')],
            ['value' => 'springtree', 'label' => Craft::t('sidebar-themes', 'Spring Tree')],
            ['value' => 'symfony', 'label' => Craft::t('sidebar-themes', 'Symfony')],
            ['value' => 'tomorrow', 'label' => Craft::t('sidebar-themes', 'Tomorrow')],
            ['value' => 'twitch', 'label' => Craft::t('sidebar-themes', 'Twitch')],
            ['value' => 'vue', 'label' => Craft::t('sidebar-themes', 'Vue')],
            ['value' => 'workhard', 'label' => Craft::t('sidebar-themes', 'Work Hard')],
        ];

        return $themes;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        // Get and pre-validate the settings
        $settings = $this->getSettings();
        $settings->validate();

        // Get the settings that are being defined by the config file
        $overrides = Craft::$app->getConfig()->getConfigFromFile(strtolower($this->handle));

        return Craft::$app->view->renderTemplate(
            'sidebar-themes/settings',
            [
                'settings' => $this->getSettings(),
                'overrides' => array_keys($overrides),
                'themeOptions' => $this->getThemes(),
            ]
        );
    }
}
