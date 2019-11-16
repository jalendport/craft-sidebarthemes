<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/jalendport
 * @copyright Copyright (c) 2018 Jalen Davenport
 */

namespace jalendport\sidebarthemes\models;

use jalendport\sidebarthemes\SidebarThemes;

use Craft;
use craft\base\Model;

/**
 * @author    Jalen Davenport
 * @package   SidebarThemes
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $theme = 'craft';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['theme', 'string'],
        ];
    }
}
