<?php
/**
 * Created by PhpStorm.
 * User: cbarranco
 * Date: 10/12/15
 * Time: 10:59 AM
 */

namespace TTBand;

class SongParser {
    private $regexes;

    public function __construct() {
        $this->regexes = [
            'chord' => '/\b([A-G])([b#])?(m|maj|min|sus|dim|7sus|add\d|M7)*(\d{0,2})(?:(?:\/)([A-G])([b#])?)?(\s|$|\{|-)/',
            'header' => '/[A-Z0-9 -]+:/',
            'parenheader' => '/\([A-Z0-9 -]+\)/',
            'repeat' => '/x[0-9]+/',
            'comment' => '/\{.*?\}/',
        ];
    }

    public function parse($songBody) {
        $songBody = trim($songBody);
        foreach ($this->regexes as $class=>$pattern) {
            $songBody = preg_replace($pattern, '<span class="' . $class . '">\\0</span>', $songBody);
        }
        return $songBody;
    }
}