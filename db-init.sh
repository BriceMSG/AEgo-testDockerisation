#!/bin/bash

echo Moving mysql db
if [ ! -d /data/mysql ]; then
	mkdir -p /data/mysql
	cp -r /var/lib/mysql/* /data/mysql
	rm -rf /var/lib/mysql
	chown -R mysql:mysql /data/mysql
  sed -i -e "s@^datadir.*@datadir = /data/mysql@" /etc/mysql/my.cnf
  /etc/init.d/mysql restart
	mysql -u root < /home/alteretgo/alter.sql
fi
