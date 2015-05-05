#!/bin/sh
d1=`date`
#echo "$d1 $1 $2 $3 $4" >> /opt/share/www/router-scripts/presence/updater.dhcp.log
logger "Running presence script with parameters: " $d1 $1 $2 $3 $4
LD_LIBRARY_PATH=/opt/lib php /opt/share/www/router-scripts/presence/updater.dhcp.php $1 $2
