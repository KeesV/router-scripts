#!/bin/sh
d1=`date`
echo "$d1 $1 $2 $3 $4" >> /www_1/presence/updater.dhcp.log
/www_1/presence/updater.dhcp.php $1 $2
