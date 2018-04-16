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

        $this->setComponents([
            'themes' => services\ThemesService::class,
        ]);

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
                'themeOptions' => $this->themes->getThemes(),
            ]
        );
    }
}
