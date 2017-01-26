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
abstract class LogHelper_BaseLogRoute extends \CLogRoute
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the log route. This method is invoked after the log route is created by the route manager.
     *
     * @return null
     */
    public function init()
    {
        $this->levels = craft()->config->get('devMode') ? '' : 'error,warning';
        $this->filter = craft()->config->get('devMode') ? 'Craft\\LogFilter' : null;

        parent::init();
    }

    // Protected Methods
    // =========================================================================

    /**
     * Saves log messages in files.
     *
     * @param array $logs The list of log messages
     *
     * @return null
     */
    protected function processLogs($logs)
    {
        $processed = array();

        foreach ($logs as $log) {
            $message = LoggingHelper::redact($log[0]);
            $level = $log[1];
            $category = $log[2];
            $time = $log[3];
            $force = (isset($log[4]) && $log[4] == true) ? true : false;
            $plugin = isset($log[5]) ? StringHelper::toLowerCase($log[5]) : 'craft';
            
            $processed[] = $this->formatLogMessageWithForce($message, $level, $category, $time, $force, $plugin);
        }
        
        return $processed;
    }

    /**
     * Formats a log message given different fields.
     *
     * @param string $message  The message content.
     * @param int    $level    The message level.
     * @param string $category The message category.
     * @param int    $time     The message timestamp.
     * @param bool   $force    Whether the message was forced or not.
     *
     * @return string The formatted message.
     */
    protected function formatLogMessageWithForce($message, $level, $category, $time, $force)
    {
        return "[$level] [$category]".($force ? " [Forced]" : "")." $message";
    }
}
