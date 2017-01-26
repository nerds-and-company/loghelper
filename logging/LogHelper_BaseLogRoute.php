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
abstract class LogHelper_BaseLogRoute extends FileLogRoute
{

    /**
     * Saves log messages in files.
     *
     * @param array $logs The list of log messages
     *
     * @return array
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
}
