<?php

class convers_encode {
    public $string;
    
    function tis620_to_utf8($string) {
        $this->string=$string;
        $s='';
        $utf8='';
        for ($i = 0; $i < strlen($this->string); $i++) {
            $s = substr($this->string, $i, 1);
            $val = ord($s);
            if ($val < 0x80) {
                $utf8 .= $s;
            } elseif ((0xA1 <= $val and $val <= 0xDA)
                    or ( 0xDF <= $val and $val <= 0xFB)) {
                $unicode = 0x0E00 + $val - 0xA0;
                $utf8 .= chr(0xE0 | ($unicode >> 12));
                $utf8 .= chr(0x80 | (($unicode >> 6) & 0x3F));
                $utf8 .= chr(0x80 | ($unicode & 0x3F));
            }
        }
        return $utf8;
    }

////////////////////////////
    function ThaiIToUTF8($string) {
        $this->string=$string;
        $out = "";
        for ($i = 0; $i < strlen($this->string); $i++) {
            if (ord($this->string[$i]) <= 126)
                $out .= $this->string[$i];
            else
                $out .= "&#" . (ord($this->string[$i]) - 161 + 3585) . ";";
        }
        return $out;
    }

/////////////////////////////
    function utf8_to_tis620($string) {
        $this->string = $string;
        $res = "";
        for ($i = 0; $i < strlen($this->string); $i++) {
            if (ord($this->string[$i]) == 224) {
                $unicode = ord($this->string[$i + 2]) & 0x3F;
                $unicode |= (ord($this->string[$i + 1]) & 0x3F) << 6;
                $unicode |= (ord($this->string[$i]) & 0x0F) << 12;
                $res .= chr($unicode - 0x0E00 + 0xA0);
                $i += 2;
            } else {
                $res .= $this->string[$i];
            }
        }
        return $res;
    }

}
