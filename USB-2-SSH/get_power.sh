#!/bin/bash

CFG_DEV='/dev/ttyACM0'
CFG_CMD='read'
CMD_CU='/usr/bin/cu'

sudo chmod 666 ${CFG_DEV}

OUT=`expect -c "
 set timeout 5
 spawn env LANG=C ${CMD_CU} -l ${CFG_DEV}
 expect \"Connected.\"
 send \"\n\"
 expect \"z>\"
 send \"${CFG_CMD}\n\"
 expect \"z>\"
 send \"\n\~.\"
exit 0
" | tr -d '\0'`


echo ${OUT} \
| sed -e 's/\r/\r\n/g' \
| head -n 8 \
| tail -n 1 \
| tr -cd '1234567890.' \
| sed -e 's/^0//g'
