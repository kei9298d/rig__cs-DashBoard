#!/bin/sh

CFG_LOGFILENAME='wattlog.csv'
# ssh to USB-2-SSH runing host
CFG_HOST='foo@host'
CFG_SSH_KEY='~/.ssh/foo.pem'
CFG_REMOTE_CMD='./get_power'

## Get current AMP
WATT=`ssh -i ${CFG_SSH_KEY} ${CFG_HOST} ${CFG_REMOTE_CMD}`

## Get UNIX Time
DATETIME=`date +%s`

## Generate CSV format
OUTPUT=`echo "${DATETIME},${WATT}"`

## Output
echo ${OUTPUT} >> ./${CFG_LOGFILENAME}

exit 0