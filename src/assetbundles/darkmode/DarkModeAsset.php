<?php
/**
 * Dark Mode plugin for Craft CMS 3.x
 *
 * A Dark Mode for Craft CMS
 *
 * @link      https://mattgrayisok.com
 * @copyright Copyright (c) 2018 Matt Gray
 */

namespace mattgrayisok\darkmode\assetbundles\DarkMode;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Matt Gray
 * @package   DarkMode
 * @since     1.0.0
 */
class DarkModeAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@mattgrayisok/darkmode/assetbundles/darkmode/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/DarkMode.js',
        ];

        $this->css = [
            'css/DarkMode.css',
        ];

        parent::init();
    }
}
