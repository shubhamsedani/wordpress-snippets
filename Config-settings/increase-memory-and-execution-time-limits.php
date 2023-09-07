<?php

/**
 * Increase Memory and Execution Time Limits
 *
 * This code is used to adjust the memory and execution time limits for WordPress.
 * It helps prevent memory-related errors and allows for longer script execution.
 *
 * - `WP_MEMORY_LIMIT`: Sets the memory limit for WordPress to unlimited (-1).
 * - `WP_MAX_MEMORY_LIMIT`: Sets the maximum memory limit to 5120 megabytes (5 gigabytes).
 * - `ini_set('memory_limit', '-1')`: Adjusts the PHP memory limit to unlimited.
 * - `ini_set('max_execution_time', '5120')`: Sets the maximum execution time for PHP scripts to 5120 seconds (about 1.4 hours).
 *
 * Please use these settings with caution and only if your server environment allows it or it will not affect with the other process.
 * Modifying memory and execution time limits should be done carefully to avoid server issues.
 */

define('WP_MEMORY_LIMIT', '-1');
define('WP_MAX_MEMORY_LIMIT', '5120M');
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '5120');
