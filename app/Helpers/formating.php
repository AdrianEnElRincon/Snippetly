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
