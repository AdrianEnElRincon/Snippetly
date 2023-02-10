<?php

if (!function_exists('prettyHTML')) :

    function prettyHTML($html_string)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($html_string, LIBXML_HTML_NOIMPLIED);
        $dom->formatOutput = true;

        return $dom->saveXML($dom->documentElement);
    }

endif;

if (!function_exists('truncate')) :

    function truncate(string $string, int $length = 10,string $end = ' ... ')
    {
        return strlen($string) > $length ? substr($string, 0, $length) . $end : $string;
    }

endif;