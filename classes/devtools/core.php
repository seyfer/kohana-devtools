<?php defined('SYSPATH') or die('No direct script access.');

class Devtools_Core
{
    /**
     * Returns reformatted phpinfo() output. Uses phpBB's script from file:
     * phpBB/includes/acp/acp_php_info.php
     *
     * @param   int     $what
     * @return  string
     */
    public static function phpinfo($what = INFO_ALL)
    {
        function remove_spaces($matches)
        {
            return '<a name="' . str_replace(' ', '_', $matches[1]) . '">';
        }

		ob_start();
		phpinfo($what);
		$phpinfo = ob_get_clean();

		$phpinfo = trim($phpinfo);

		// Here we play around a little with the PHP Info HTML to try and stylise
		// it along phpBB's lines ... hopefully without breaking anything. The idea
		// for this was nabbed from the PHP annotated manual
		preg_match_all('#<body[^>]*>(.*)</body>#si', $phpinfo, $output);

		if (empty($phpinfo) || empty($output))
		{
			trigger_error('NO_PHPINFO_AVAILABLE', E_USER_WARNING);
		}

		$output = $output[1][0];

		// expose_php can make the image not exist
		if (preg_match('#<a[^>]*><img[^>]*></a>#', $output))
		{
			$output = preg_replace('#<tr class="v"><td>(.*?<a[^>]*><img[^>]*></a>)(.*?)</td></tr>#s', '<tr class="row1"><td><table class="type2"><tr><td>\2</td><td>\1</td></tr></table></td></tr>', $output);
		}
		else
		{
			$output = preg_replace('#<tr class="v"><td>(.*?)</td></tr>#s', '<tr class="row1"><td><table class="type2"><tr><td>\1</td></tr></table></td></tr>', $output);
		}
		$output = preg_replace('#<table[^>]+>#i', '<table class="phpinfo">', $output);
		$output = preg_replace('#<img border="0"#i', '<img', $output);
		$output = str_replace(array('class="e"', 'class="v"', 'class="h"', '<hr />', '<font', '</font>'), array('class="row1"', 'class="row2"', '', '', '<span', '</span>'), $output);

		// Fix invalid anchor names (eg "module_Zend Optimizer")
		$output = preg_replace_callback('#<a name="([^"]+)">#', 'remove_spaces', $output);

		if (empty($output))
		{
			trigger_error('NO_PHPINFO_AVAILABLE', E_USER_WARNING);
		}

		$orig_output = $output;

		preg_match_all('#<div class="center">(.*)</div>#siU', $output, $output);
		$output = (!empty($output[1][0])) ? $output[1][0] : $orig_output;

        return $output;
    }
}
