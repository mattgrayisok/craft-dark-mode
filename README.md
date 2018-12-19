# Dark Mode plugin for Craft CMS 3.x

A Dark Mode for Craft CMS

![Logo](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require mattgrayisok/craft-dark-mode

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Dark Mode.

## Dark Mode Overview

Sometimes you just need a little less light and a little more shade.

![Screenshot](resources/img/screengrab.png)

## Plugin Developers

If your plugin adds custom elements to the control panel and you'd like to support Dark Mode
it couldn't be easier. Dar Mode adds the class `.darkmode` to the `body` tag when it is enabled,
simply add some additional styles to your plugin to take this into account.

## Dark Mode Roadmap

* Improve assets display. Might need to make some custom images
* Get redactor styling to match
* Allow dark mode to be [de]activated using a switch in the nav

Brought to you by [Matt Gray](https://mattgrayisok.com)

---

Icon made by Freepik from https://www.flaticon.com/
