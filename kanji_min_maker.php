<?php
# Reads in kanji.txt and outputs kanji.min.txt and kanji.day.txt
#
# kanji.txt contains each character on a new line, followed by a space, and a
#   key-word, possibly separated by forward slashes if there are more key-words.
#   The line number corresponds to the key-word index in the textbook I'm using.
#
# kanji.day.txt contains five characters per line
# kanji.min.txt contains every character on a single line with no separation
#
#
# kanji.txt might look something like:
# 一 one / ceiling / floor
# 二 two
# 三 three
# 四 four
# 五 five
# 六 six
# 七 seven
# 八 eight
# 九 nine
# 十 ten / needle
# 
# The cooresponding kanji.min.txt would look like:
# 一二三四五六七八九十
#
# And the cooresponding kanji.day.txt would look like:
# 一二三四五
# 六七八九十
#
$all_kanji = "";
foreach(explode("\n",file_get_contents("kanji.txt")) as $line)
    $all_kanji .= substr($line,0,3);
file_put_contents("kanji.min.txt",$all_kanji."\n");

# chunk_split is not multibyte safe, so we have to convert it to EUC-JP, chunk
# it, then convert it back to UTF-8.
file_put_contents("kanji.day.txt",
    mb_convert_encoding(
        chunk_split(
            mb_convert_encoding($all_kanji,"EUC-JP","UTF-8"),10,"\n")
    ,"UTF-8","EUC-JP"));
