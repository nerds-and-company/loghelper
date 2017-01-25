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
class LogHelper_StrErrLogRoute extends LogHelper_BaseLogRoute
{
    /**
     * Process logs.
     *
     * @param array $logs
     */
    public function processLogs($logs)
    {
        $strErr = fopen('php://stderr', 'w');

        foreach ($logs as $log) {
            fwrite($strErr, $this->formatLogMessage($log));
        }

        fclose($strErr);
    }
}
