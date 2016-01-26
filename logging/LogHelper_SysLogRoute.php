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
class LogHelper_SysLogRoute extends \CLogRoute
{
    /**
     * Process logs.
     *
     * @param array $logs
     */
    public function processLogs($logs)
    {
        foreach ($logs as $log) {
            syslog(LOG_DEBUG, $log[0]."\n");
        }
    }
}
