<?php

namespace Craft;

/**
 * Log Helper Plugin.
 *
 * Advanced logging options
 *
 * @author    Nerds & Company
 * @copyright Copyright (c) 2016, Nerds & Company
 *
 * @link      https://www.nerds.company
 */
class LogHelperPlugin extends BasePlugin
{
    /**
     * Return plugin name.
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Log Helper');
    }

    /**
     * Return plugin version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '2.0.0';
    }

    /**
     * Return developer name.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Nerds & Company';
    }

    /**
     * Return developer url.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://www.nerds.company';
    }

    /**
     * Initialize plugin.
     */
    public function init()
    {
        // Disable web logging?
        if (!craft()->config->get('useWebLog')) {
            craft()->log->removeRoute('WebLogRoute');
        }

        // Disable file logging?
        if (!craft()->config->get('useFileLog')) {
            craft()->log->removeRoute('FileLogRoute');
        }

        // Use STDERR logging?
        if (craft()->config->get('useStdErrLog')) {
            require_once __DIR__.'/logging/LogHelper_StdErrLogRoute.php';
            craft()->log->addRoute('Craft\LogHelper_StdErrLogRoute');
        }

        // Use SysLog logging?
        if (craft()->config->get('useSysLog')) {
            require_once __DIR__.'/logging/LogHelper_SysLogRoute.php';
            craft()->log->addRoute('Craft\LogHelper_SysLogRoute');
        }
    }
}
