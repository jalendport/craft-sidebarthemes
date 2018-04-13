<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\sidebarthemes\assetbundles\SidebarThemes;

use lukeyouell\sidebarthemes\SidebarThemes;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Luke Youell
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

        $this->sourcePath = "@lukeyouell/sidebarthemes/assetbundles/sidebarthemes/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'themes/css/theme-'.$settings->theme.'.css',
        ];

        parent::init();
    }
}
