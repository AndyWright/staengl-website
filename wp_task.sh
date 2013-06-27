#!/bin/bash

# written by Wil Helser - http://wilhelser.com
#
# This script will make a dump of one WordPress database, change the URLs, and upload to the new database


 # Settings for source db ...
DB_NAME=''
DB_USER=''
DB_PASS=''
DB_HOST=''    #example.com
LOCAL_URL =''     #example.local


# Settings for destination db ...
OUT_DB_NAME=''
OUT_DB_USER=''
OUT_DB_PASS=''
OUT_DB_HOST=''    #example.com
OLD_URL=''  #example.com

# End of configuration

# Usage  ./wp_task.sh pull    or ./wp_task.sh push

if  [ "$1" == pull ]; then
mkdir tmp;
echo "dumping database... "
mysqldump --add-drop-table  -h ${REMOTE_DB_HOST} -u ${REMOTE_DB_USER} -p${REMOTE_DB_PASS} ${REMOTE_DB_NAME} > tmp/${REMOTE_DB_NAME}.sql;
echo "db dumped... updating urls..."
sed -i "s/www.${REMOTE_URL}/${LOCAL_URL}/g" tmp/${REMOTE_DB_NAME}.sql; #replace www version first, just in case...
sed -i "s/${REMOTE_URL}/${LOCAL_URL}/g" tmp/${REMOTE_DB_NAME}.sql;
echo "urls updated from $REMOTE_URL to $LOCAL_URL ..."
 echo -n "uploading to the new DB..."
    mysql -h ${LOCAL_DB_HOST} -u ${LOCAL_DB_USER} -p${LOCAL_DB_PASS} ${LOCAL_DB_NAME}  < tmp/${REMOTE_DB_NAME}.sql;
    echo "Done! A little cleanup..."
    rm -rf tmp
    echo "And I'm out!!!"
    exit 1

elif [ $1 == push ]; then
        mkdir tmp;
echo "dumping database... "
mysqldump --add-drop-table  -h ${LOCAL_DB_HOST} -u ${LOCAL_DB_USER} -p${LOCAL_DB_PASS} ${LOCAL_DB_NAME} > tmp/${LOCAL_DB_NAME}.sql;
echo "db dumped... updating urls..."
sed -i "s/www.${LOCAL_URL}/${REMOTE_URL}/g" tmp/${LOCAL_DB_NAME}.sql; #replace www version first, just in case...
sed -i "s/${LOCAL_URL}/${REMOTE_URL}/g" tmp/${LOCAL_DB_NAME}.sql;
echo "urls updated from $LOCAL_URL to $REMOTE_URL ..."
 echo -n "uploading to the new DB..."
    mysql -h ${REMOTE_DB_HOST} -u ${REMOTE_DB_USER} -p${REMOTE_DB_PASS} ${REMOTE_DB_NAME}  < tmp/${LOCAL_DB_NAME}.sql;
    echo "Done! A little cleanup..."
    rm -rf tmp
    echo "And I'm out!!!"
    exit 2
fi
