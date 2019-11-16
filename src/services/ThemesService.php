<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/jalendport
 * @copyright Copyright (c) 2018 Jalen Davenport
 */

namespace jalendport\sidebarthemes\services;

use jalendport\sidebarthemes\SidebarThemes;

use Craft;
use craft\base\Component;

/**
 * Class SidebarThemes
 *
 * @author    Jalen Davenport
 * @package   SidebarThemes
 * @since     1.0.0
 *
 */
class ThemesService extends Component
{
    // Public Methods
    // =========================================================================

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
            ['value' => 'brinjal', 'label' => Craft::t('sidebar-themes', 'Brinjal')],
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
            ['value' => 'netflix', 'label' => Craft::t('sidebar-themes', 'Netflix')],
            ['value' => 'ochin', 'label' => Craft::t('sidebar-themes', 'Ochin')],
            ['value' => 'playstation', 'label' => Craft::t('sidebar-themes', 'Playstation')],
            ['value' => 'purpledaydream', 'label' => Craft::t('sidebar-themes', 'Purple Daydream')],
            ['value' => 'smooch', 'label' => Craft::t('sidebar-themes', 'Smooch')],
            ['value' => 'snazzy', 'label' => Craft::t('sidebar-themes', 'Snazzy')],
            ['value' => 'spacegrey', 'label' => Craft::t('sidebar-themes', 'Space Grey')],
            ['value' => 'spotify', 'label' => Craft::t('sidebar-themes', 'Spotify')],
            ['value' => 'springtree', 'label' => Craft::t('sidebar-themes', 'Spring Tree')],
            ['value' => 'symfony', 'label' => Craft::t('sidebar-themes', 'Symfony')],
            ['value' => 'thoroughcare', 'label' => Craft::t('sidebar-themes', 'Thorough Care')],
            ['value' => 'tomorrow', 'label' => Craft::t('sidebar-themes', 'Tomorrow')],
            ['value' => 'twitch', 'label' => Craft::t('sidebar-themes', 'Twitch')],
            ['value' => 'vue', 'label' => Craft::t('sidebar-themes', 'Vue')],
            ['value' => 'workhard', 'label' => Craft::t('sidebar-themes', 'Work Hard')],
        ];

        return $themes;
    }
}
