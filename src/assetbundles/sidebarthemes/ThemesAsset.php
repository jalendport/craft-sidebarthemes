<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/jalendport
 * @copyright Copyright (c) 2018 Jalen Davenport
 */

namespace jalendport\sidebarthemes\assetbundles\SidebarThemes;

use jalendport\sidebarthemes\SidebarThemes;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Jalen Davenport
 * @package   SidebarThemes
 * @since     1.0.0
 */
class ThemesAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $settings = SidebarThemes::$plugin->getSettings();

        $this->sourcePath = "@jalendport/sidebarthemes/assetbundles/sidebarthemes/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'themes/css/theme-'.$settings->theme.'.css',
        ];

        parent::init();
    }
}
