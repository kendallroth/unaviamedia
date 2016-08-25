#!/usr/bin/env bash

#sudo bash

echo "Updating repositores"
sudo apt update -y > /dev/null

##################################################
# nginx
echo "Nginx Setup"

echo "Installing nginx"
sudo apt install -y nginx > /dev/null
sudo service nginx start

echo "Configuring nginx"
sudo rm /etc/nginx/sites-available/site_conf
sudo rm /etc/nginx/sites-enabled/site_conf
sudo cp /vagrant/.provision/nginx/nginx_conf /etc/nginx/sites-available/site_conf > /dev/null
sudo chmod 644 /etc/nginx/sites-available/site_conf
ln -s /etc/nginx/sites-available/site_conf /etc/nginx/sites-enabled/site_conf
sudo rm -rf /etc/nginx/sites-available/default
sudo rm -rf /etc/nginx/sites-enabled/default

sudo service nginx restart > /dev/null

# clean /var/www
sudo rm -Rf /var/www

# symlink /var/www => /vagrant
ln -s /vagrant /var/www

##################################################
# php
echo "PHP Setup"

echo "Updating php repositories"
sudo apt install -y python-software-properties build-essential > /dev/null
sudo add-apt-repository ppa:ondrej/php5 > /dev/null
sudo apt update > /dev/null

echo "Installing php"
sudo apt install -y php5-common php5-dev php5-cli php5-fpm > /dev/null

echo "Installing php extensions"
sudo apt install -y curl php5-curl php5-gd php5-mcrypt php5-mysql > /dev/null

sudo sed -i s/\;cgi\.fix_pathinfo\s*\=\s*l/cgi.fix_pathinfo\=0/ /etc/php5/fpm/php.ini
sudo service php5-fpm restart > /dev/null
sudo service nginx restart > /dev/null

##################################################
# mysql
#echo "MySQL Setup"

#echo "Installing automation utilities"
#sudo apt install -y debconf-utils > /dev/null

#echo "Setting mysql setup variables"
#debconf-set-selections <<< 'mysql-server mysql-server/root_password password Passw0rd'
#debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password Passw0rd'

#echo "Installing mysql"
#sudo apt install -y mysql-server > /dev/null


##################################################
# git
echo "Git Setup"

echo "Installing git"
sudo apt install -y git > /dev/null

##################################################
# nodejs
echo "NodeJS Setup"

echo "Updating NodeJS repositories"
sudo curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash - > /dev/null

echo "Installing nodejs"
sudo apt install -y nodejs > /dev/null

##################################################
# foundation
echo "Foundation Setup"
sudo npm install --global foundation-cli > /dev/null
