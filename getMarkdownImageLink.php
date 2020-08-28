<?php
/**
 * 获取Markdown格式的图片连接.
 */

function getPostImageLinks($postDir, $isMarkdownFormat = true, $baseDir = __DIR__ . "/img/", $linkPre = 'https://cdn.jsdelivr.net/gh/Jovry-Lee/cdn/img/')
{
    $result = array();

    $scanDir = $baseDir . $postDir;
    if (!file_exists($scanDir)) {
        return $result;
    }

    $postImageNames = scandir($scanDir);
    foreach ($postImageNames as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        $imageName = basename($item, '.png');
        $link = $linkPre . $postDir . "/$item";
        $result[$imageName] = $isMarkdownFormat ? "![$imageName]($link)" : $link;
    }
    return $result;
}

$dir = __DIR__ . "/img/FastCGI和PHP-FPM的关系/";

if (!isset($argv[1])) {
    echo "Please input post name! Exit~\n";
    die;
}

$ret = getPostImageLinks($argv[1]);
var_export($ret);
