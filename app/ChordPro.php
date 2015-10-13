<?php
/**
 * Created by PhpStorm.
 * User: cbarranco
 * Date: 10/12/15
 * Time: 11:24 AM
 */

namespace TTBand;

class ChordPro {
    private $chordproText;
    const CHORDREGEX = '/\b([A-G])([b#])?(m|maj|min|sus|dim|7sus|add\d|M7)*(\d{0,2})(?:(?:\/)([A-G])([b#])?)?(\s|$|\{|-)/';

    public function __construct($chordproText) {
        $this->chordproText = $chordproText;
    }

    public static function isChordLine($line) {
        return strlen(trim($line)) && strlen(trim(preg_replace(self::CHORDREGEX, '', $line))) < 1; //strip out chords and whitespace, if anything left, lyrics line
    }

    public static function fromText($plainText) {
        $output = '';
        $lines = explode("\n", $plainText);
        for ($ii = 0; $ii < count($lines); $ii++) {
            $line = $lines[$ii];
            if (self::isChordLine($line)) {
                $chords = [];
                preg_match_all(self::CHORDREGEX, $line, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE);
                foreach ($matches[0] as $match) {
                    $chords[$match[1]] = $match[0];
                }
                $maxChordPosition = max(array_keys($chords));
                if (self::isChordLine($lines[$ii+1])) $lyricsLine = '';
                else $lyricsLine = isset($lines[$ii+1]) ? $lines[$ii+1] : '';
                $newLine = '';
                for ($index = 0; $index <= max($maxChordPosition, strlen($lyricsLine)); $index++) {
                    if (isset($chords[$index])) $newLine .= "[" . trim($chords[$index]) . "]";

                    if (isset($lyricsLine[$index])) $newLine .= $lyricsLine[$index];
                    else $newLine .= ' ';
                }
                $output .= "$newLine\n";
                $ii++;
            } else {
                $output .= "$line\n";
            }
        }
        return new ChordPro($output);
    }

    public function chordPro() {
        return $this->chordproText;
    }

    public function output() {
        $output = '';
        $state = [];
        foreach (explode("\n", $this->chordproText) as $line) {
            $line = trim($line);

            if ((strlen($line) < 1) || $line[0] == "#") continue;

//            if (preg_match('/\{(.*?)\}/', $line, $matches)) { //line has a directive
            $line = preg_replace_callback('/\{(.*?)\}/', function($matches) use (&$state, &$output) {
                $args = explode(':', $matches[1]);
                switch ($args[0]) {
                    case 'verse':
                        if (isset($state['verse'])) die('Error: nested verse tags');
                        $state['verse'] = $args[1];
                        $output .= "<div id=\"verse-$args[1]\" class=\"verse\"><div class=\"header\">" . strtoupper($args[1]) . ":</div>";
                        return '';
                    case 'endverse':
                        $tmp = $state['verse'];
                        unset($state['verse']);
                        $output .=  "</div><!--for verse-$tmp-->";
                        return '';
                    case 'chorus':
                        if (isset($state['chorus'])) die('Error: nested chorus tags');
                        $state['chorus'] = $args[1];
                        $output .=  "<div id=\"chorus-$args[1]\" class=\"chorus\"><div class=\"header\">" . strtoupper($args[1]) . ":</div>";
                        return '';
                    case 'endchorus':
                        $tmp = $state['chorus'];
                        unset($state['chorus']);
                        $output .=  "</div><!--for chorus-$tmp-->";
                        return '';
                    case 'repeat':
                        $str = '(REPEAT ' . strtoupper($args[1]);
                        if (isset($args[2])) $str .= " x$args[2]";
                        $str .= ')';
                        $output .=  "<div id=\"repeat-$args[1]\" class=\"repeat\">$str</div>";
                        return '';
                    case 'comment':
                        return "<span class=\"comment\">$args[1]</span>";
//                        return '';
                }
            }, $line);

            $chords = $lyrics = [];
            $pos = 0;
            foreach (preg_split('/(\[.+?\])/', $line, null, PREG_SPLIT_DELIM_CAPTURE) as $word) {
                if (strlen($word) < 1) continue;
                if ($word[0] == '[') {
                    $pos++;
                    $chord = substr($word, 1, -1);
                    $chords[$pos] = $chord;
                } else {
                    if ($word[0] == ' ') $pos++;
                    $lyrics[$pos] = $word;
                }
            }
            $chordLine = '';
            $lyricLine = '';
            $cursor = 0;
            $chordPosition = 0;
            for ($col = 0; $col <= $pos; $col++) {
                $chord = isset($chords[$col]) ? $chords[$col] . '  ' : '';
//                $lyric = isset($lyrics[$col]) ? ltrim($lyrics[$col]) : str_repeat(' ', max(0, strlen($chord)));
                $lyric = isset($lyrics[$col]) ? ltrim($lyrics[$col]) : '';
                //$chordLine .= $chord . str_repeat(' ', max(0, strlen($lyric) - strlen($chord)));
                //$lyricLine .= $lyric . str_repeat(' ', max(0, strlen($chord) - strlen($lyric)));

                if (strlen($chord)) {
                    $chordLine .= "<div class=\"chord\" style=\"margin-left: {$cursor}ch;\">$chord</div>";
                }
                if (strlen($lyric)) {
                    $lyricLine .= "<div class=\"lyric\" style=\"margin-left: {$cursor}ch;\">$lyric</div>";
//                    $cursor += strlen($lyric);
                }
                $cursor += max(0, strlen(strip_tags($chord)), strlen(strip_tags($lyric)));
            }
            if (strlen($chordLine)) $output .= "<div class=\"chords\">$chordLine</div>";
            if (strlen($lyricLine)) $output .= "<div class=\"lyrics\">$lyricLine</div>";
        }
//        $pages = [];
//        $lines = explode("\n", $output);
//        $ii = 0;
//        $pageNum = 0;
//        foreach ($lines as $line) {
//            if ($ii >= 72) {
//                $pageNum++;
//                $ii = 0;
//            }
//            if (strlen(strip_tags($line)) > 100) $line = '<span class="text-danger">' . $line . '</span>';
//            if (!isset($pages[$pageNum])) $pages[$pageNum] = '';
//            $pages[$pageNum] .= "$line\n";
//        }
//        return $pages;
        return [0=>$output];
    }
}