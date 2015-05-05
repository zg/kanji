#!/usr/local/bin/python
# -*- coding: utf-8 -*-
#
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

with open('kanji.txt', 'r') as f:
    all_kanji = [line[0:3] for line in f]

with open('kanji.min.txt', 'w') as f:
    f.write("".join(all_kanji)+"\n")

with open('kanji.day.txt', 'w') as f:
    f.write("".join([kanji if (i+1) % 5 else kanji + "\n" for i, kanji in enumerate(all_kanji)]))
