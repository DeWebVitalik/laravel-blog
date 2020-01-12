<?php

namespace App\Services;

class PostService
{
    /**
     * Clearing tags and trimming content
     *
     * @param string $content
     * @param int $length
     * @return string
     */
    public static function getLittleContent(string $content, int $length): string
    {
        $content = strip_tags(htmlspecialchars_decode($content));
        return substr($content, 0, $length);
    }

    /**
     * Checks if the file is an image
     *
     * @param $file
     * @return bool
     */
    public static function fileIsImage($file): bool
    {
        $file = explode('.', $file);
        $count = count($file);
        if ($file[$count - 1] == 'jpeg' || $file[$count - 1] == 'png' || $file[$count - 1] == 'jpg') {
            return true;
        }
        return false;
    }
}