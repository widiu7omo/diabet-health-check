<?php
function getArrayColumn($array = [], $titleAttribute = 'title', $optionClass = '', $separator = ', ')
{
    $result = [];
    foreach ($array as $link) {
        $title = $link[$titleAttribute];
//        $replace = preg_replace('/\$\{href\}/', url($baseUrl, $link[$idAttribute]), $html);
//        $replace = preg_replace('/\$\{title\}/', $link[$titleAttribute], $replace);
        $html = "<span class='{$optionClass}'>{$title}</span>";
        $result[] = $html;
    }
    return implode($separator, $result);
}
