<?php

namespace Craft;
require_once __DIR__.'/LogHelper_BaseLogRoute.php';

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
class LogHelper_SysLogRoute extends LogHelper_BaseLogRoute
{
    /**
     * Process logs.
     *
     * @param array $logs
     */
    public function processLogs($logs)
    {
        foreach ($logs as $log) {
            syslog(LOG_DEBUG, $this->formatLogMessage($log));
        }
    }
}
