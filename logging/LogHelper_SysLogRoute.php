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
class LogHelper_SysLogRoute extends LogHelper_BaseLogRoute
{
    /**
     * Process logs.
     *
     * @param array $logs
     */
    protected function processLogs($logs)
    {
        $logs = parent::processLogs($logs);

        foreach ($logs as $log) {
            syslog(LOG_DEBUG, $log."\n");
        }
    }
}
