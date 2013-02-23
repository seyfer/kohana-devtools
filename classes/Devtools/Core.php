<?php defined('SYSPATH') or die('No direct script access.');

class Devtools_Core
{
    public static $kohana_environments = array(
        10  => 'PRODUCTION',
        20  => 'STAGING',
        30  => 'TESTING',
        40  => 'DEVELOPMENT',
    );
}
