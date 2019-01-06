<?php
/**
 * Dark Mode plugin for Craft CMS 3.x
 *
 * A Dark Mode for Craft CMS
 *
 * @link      https://mattgrayisok.com
 * @copyright Copyright (c) 2018 Matt Gray
 */

namespace mattgrayisok\darkmode;

use mattgrayisok\darkmode\models\Settings;
use mattgrayisok\darkmode\assetbundles\DarkMode\DarkModeAsset;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class DarkMode
 *
 * @author    Matt Gray
 * @package   DarkMode
 * @since     1.0.0
 *
 */
class DarkMode extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var DarkMode
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.2';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if ( Craft::$app->request->isCpRequest && !Craft::$app->user->isGuest )
        {
            $this->view->registerAssetBundle(DarkModeAsset::class);
        }

        Craft::info(
            Craft::t(
                'craft-dark-mode',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    /*protected function createSettingsModel()
    {
        return new Settings();
    }*/

    /**
     * @inheritdoc
     */
    /*protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'craft-dark-mode/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }*/
}
