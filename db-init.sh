#!/bin/bash

echo Moving mysql db
#if [ ! -d /data/mysql ]; then
	#mkdir -p /data/mysql
	#cp -r /var/lib/mysql/* /data/mysql
	#rm -rf /var/lib/mysql
	#chown -R mysql:mysql /data/mysql
	mysql -h 127.0.0.1 -P 3306 -u root < /home/alteretgo/alter.sql
#fi
