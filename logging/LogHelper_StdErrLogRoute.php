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
class LogHelper_StdErrLogRoute extends LogHelper_BaseLogRoute
{
    /**
     * Process logs.
     *
     * @param array $logs
     */
    protected function processLogs($logs)
    {
        $logs = parent::processLogs($logs);
        
        $strErr = fopen('php://stderr', 'w');

        foreach ($logs as $log) {
            fwrite($strErr, $log."\n");
        }

        fclose($strErr);
    }
}
