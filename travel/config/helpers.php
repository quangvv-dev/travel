<?php

if (!function_exists('getLang')) {
    function getLang($str, $e = null)
    {
        global $request;
        @$lang = in_array($request->lang, ['vi', 'en', 'th']) ? $request->lang : 'en';
        @$str .= "_" . $lang;
        if (!empty($e)) {
            return $e->$str;
        } else {
            return @$str;
        }
    }
}
