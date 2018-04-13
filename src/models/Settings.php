<?php
/**
 * Sidebar Themes plugin for Craft CMS 3.x
 *
 * Customise the look of the CP sidebar
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\sidebarthemes\models;

use lukeyouell\sidebarthemes\SidebarThemes;

use Craft;
use craft\base\Model;

/**
 * @author    Luke Youell
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
