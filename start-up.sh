#!/bin/bash

# Configuration variables
ndd='alteretgo.my-workflow'
ndd2='alteretgo'
dir='alter-et-go'
wifiName='TheChangeMaker'
wifiPassword='Alteretgo2016'

# Creating subdomains
echo Creating vhosts
cat > "/etc/apache2/sites-available/$ndd2.conf" << EOF
<VirtualHost *:80>
	ServerAdmin service.informatique@my-serious-game.com
	ServerName apprenant.$ndd.fr
	DocumentRoot /var/www/$ndd2/apprenant
	<Directory /var/www/$ndd2/apprenant>
		Options -Indexes +FollowSymLinks
		AllowOverride All
	</Directory>
</VirtualHost>
<VirtualHost *:80>
	ServerAdmin service.informatique@my-serious-game.com
	ServerName commun.$ndd.fr
	DocumentRoot /var/www/$ndd2/commun
	<Directory /var/www/$ndd2/commun>
		Options -Indexes +FollowSymLinks
		AllowOverride All
	</Directory>
</VirtualHost>
<VirtualHost *:80>
	ServerAdmin service.informatique@my-serious-game.com
	ServerName formateur.$ndd.fr
	DocumentRoot /var/www/$ndd2/formateur
	<Directory /var/www/$ndd2/formateur>
		Options -Indexes +FollowSymLinks
		AllowOverride All
	</Directory>
</VirtualHost>
<VirtualHost *:80>
	ServerAdmin service.informatique@my-serious-game.com
	ServerName projecteur.$ndd.fr
	DocumentRoot /var/www/$ndd2/projecteur
	<Directory /var/www/$ndd2/projecteur>
		Options -Indexes +FollowSymLinks
		AllowOverride All
	</Directory>
</VirtualHost>
EOF

echo Adding vhosts to Apache2
a2ensite "$ndd2.conf"

echo Adding mods to Apache2
a2enmod deflate expires filter headers rewrite

echo Reloading Apache2
service apache2 reload

# Network settings
echo Modifying DHCP
cat >> /etc/dhcpcd.conf << EOF
denyinterfaces wlan0
EOF

# Wifi settings
echo Changing the Wifi interface
cat > /etc/network/interfaces.d/wlan0 << EOF
auto wlan0
iface wlan0 inet static
address 192.168.200.1
netmask 255.255.255.0
network 192.168.200.0
broadcast 192.168.200.255
EOF

# Change the wifi settings
echo Changing Wifi settings
cat > /etc/hostapd/hostapd.conf << EOF
interface=wlan0
driver=nl80211
ssid=$wifiName
hw_mode=g
channel=6
ieee80211n=1
wmm_enabled=1
ht_capab=[HT40][SHORT-GI-20][DSSS_CCK-40]
macaddr_acl=0
auth_algs=1
ignore_broadcast_ssid=0
wpa=2
wpa_key_mgmt=WPA-PSK
wpa_passphrase=$wifiPassword
rsn_pairwise=CCMP
EOF

echo Modifying Hostapd settings
DAEM='DAEMON_CONF="/etc/hostapd/hostapd.conf"'
sed -i 's~#DAEMON_CONF=""~'"$DAEM"'~g' /etc/default/hostapd

# IP range setting
echo IP range setting
mv /etc/dnsmasq.conf /etc/dnsmasq.conf.bak
cat > /etc/dnsmasq.conf << EOF
interface=wlan0
listen-address=192.168.200.1
bind-interfaces
server=127.0.0.1
local=/my-workflow.fr/
domain-needed
bogus-priv
dhcp-range=192.168.200.10,192.168.200.200,48h
address=/my-workflow.fr/192.168.200.1
EOF

echo Moving mysql db
if [ ! -d /data/mysql ]; then
	mysqld_safe & sleep 5
	mkdir -p /data/mysql
	cp -r /var/lib/mysql/* /data/mysql
	rm -rf /var/lib/mysql
	chown -R mysql:mysql /data/mysql
	mysql -u root < /home/alteretgo/alter.sql
fi
