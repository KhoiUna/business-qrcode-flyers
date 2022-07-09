#!/bin/bash

# Kill NodeJS process
process_str=`(ps -s | grep nodejs)`
read -ra split_str <<< "$process_str"
pid="${split_str[0]}"
# echo $pid
kill -15 $pid
#

python convert_img_to_pdf.py