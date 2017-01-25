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
    /**
     * Formats a log message given different fields.
     *
     * @param array $log The log array.
     *
     * @return string The formatted message.
     */
    protected function formatLogMessage($log)
    {
        $message = LoggingHelper::redact($log[0]);
        $level = $log[1];
        $category = $log[2];
        $force = (isset($log[4]) && $log[4] == true) ? true : false;
        $plugin = isset($log[5]) ? StringHelper::toLowerCase($log[5]) : 'craft';

        $labels = array_filter(array($plugin, $level, $category, $force));
        $labels = array_map(function($item) {
            return "[$item]";
        }, $labels);

        return implode(' ', $labels) . ' ' . $message . "\n";
    }
}
