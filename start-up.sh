#!/bin/bash
# setup.sh

# Configuration variables
# Domaine name
ndd='alteretgo.my-workflow'
ndd2='alteretgo'
# Directory name
dir='alter-et-go'
# Wifi name
wifiName='TheChangeMaker'
# Wifi password
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

# Creating the symbolic link
echo Creating SymLinks
ln -s "/home/pi/$dir" "/var/www/$dir"

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
# This is the name of the WiFi interface we configured above
interface=wlan0
# Use the nl80211 driver with the brcmfmac driver
driver=nl80211
# This is the name of the network
ssid=$wifiName
# Use the 2.4GHz band
hw_mode=g
# Use channel 6
channel=6
# Enable 802.11n
ieee80211n=1
# Enable WMM
wmm_enabled=1
# Enable 40MHz channels with 20ns guard interval
ht_capab=[HT40][SHORT-GI-20][DSSS_CCK-40]
# Accept all MAC addresses
macaddr_acl=0
# Use WPA authentication
auth_algs=1
# Require clients to know the network name
ignore_broadcast_ssid=0
# Use WPA2
wpa=2
# Use a pre-shared key
wpa_key_mgmt=WPA-PSK
# The network passphrase
wpa_passphrase=$wifiPassword
# Use AES, instead of TKIP
rsn_pairwise=CCMP
EOF

#
echo Modifying Hostapd settings
DAEM='DAEMON_CONF="/etc/hostapd/hostapd.conf"'
sed -i 's~#DAEMON_CONF=""~'"$DAEM"'~g' /etc/default/hostapd

# IP range setting
echo IP range setting
mv /etc/dnsmasq.conf /etc/dnsmasq.conf.bak
cat > /etc/dnsmasq.conf << EOF
# Use interface wlan0
interface=wlan0
# Explicitly specify the address to listen on
listen-address=192.168.200.1
# Bind to the interface to make sure we aren't sending things elsewhere
bind-interfaces
# Forward DNS requests to Google DNS
#server=192.168.200.1
# Don't forward short names
domain-needed
# Never forward addresses in the non-routed address spaces.
bogus-priv
# Assign IP addresses between IP.min and IP.max with a 48 hour lease time
dhcp-range=192.168.200.10,192.168.200.200,48h
EOF

# Adding domains to the host file
echo Adding domains to the host
cat >> /etc/hosts << EOF
192.168.200.1  apprenant.$ndd.fr commun.$ndd.fr formateur.$ndd.fr node.$ndd.fr projecteur.$ndd.fr
EOF

# /etc/init.d/dnsmasq start
