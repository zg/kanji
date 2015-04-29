<?php
/**
 * reads kanji.txt, outputs kanji.min.txt and kanji.day.txt
 */
$all_kanji = "";
foreach(explode("\n",file_get_contents("kanji.txt")) as $line)
    $all_kanji .= substr($line,0,3);
file_put_contents("kanji.min.txt",$all_kanji."\n");
file_put_contents("kanji.day.txt",mb_convert_encoding(chunk_split(mb_convert_encoding($all_kanji,"EUC-JP","UTF-8"),10,"\n"),"UTF-8","EUC-JP"));
