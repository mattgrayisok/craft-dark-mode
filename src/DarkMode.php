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
use craft\web\View;

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
    public $schemaVersion = '1.1.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_LOAD_PLUGINS,
            function () {
                $request = Craft::$app->getRequest();
                // Respond to Control Panel requests
                if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
                   $this->handleAdminCpRequest();
                }
            }
        );

        Craft::info(
            Craft::t(
                'craft-dark-mode',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    protected function handleAdminCpRequest()
    {
        $request = Craft::$app->getRequest();
        if (!Craft::$app->user->isGuest) {
            $this->view->registerAssetBundle(DarkModeAsset::class);

            Event::on(
                View::class,
                View::EVENT_BEGIN_BODY,
                function () {
                    Craft::debug(
                        'View::EVENT_BEGIN_BODY',
                        __METHOD__
                    );
                    // JS here to add class to body tag to avoid style flash if it's added later

                    echo "<script>
                    var body = document.getElementsByTagName('body')[0];
                    if (localStorage.getItem('darkmode-enabled') == 'true') {
                        body.classList.add('darkmode');
                    }
                    </script>";

                }
            );
        }
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
