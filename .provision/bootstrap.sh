# Create new sudo user and sign in with the account
adduser development
usermod -aG sudo development
su development
# Will need to enter password for first sudo use

# Update repositories and upgrade available packages
echo "Update repositories and upgrade available packages"
sudo apt update -y
sudo apt upgrade -y

# Install git
echo "Install some helper programs"
sudo apt install -y git vim curl screen 

# Install nginx
echo "Install nginx"
sudo apt install -y nginx
# Possible check to ensure nginx is working (go to ip)

# Move to web directory and clean it
sudo chown -R development:www-data /var/www
cd /var/www
rm -rf html

# Clone git repository and link web root and nginx server block
echo "Clone repository and link web root and nginx server block"
git clone https://github.com/unaviamedia/unaviamedia.git

# Install mysql
echo "Install mysql"
sudo apt install mysql-server
# Add password automatically ("Passw0rD")

echo "Secure mysql installation"
sudo mysql_secure_installation
# Validate password (n)
# Change password (n)
# Remove anonymous users (y)
# Disallow root login remotely (y)
# Remove test database (y)
# Reload table privileges (y)

# Install php and mysql handling
echo "Install PHP and MySQL handling"
sudo apt install php-fpm php-mysql -y

# Run some configuration changes to php.ini (/etc/php/7.0/fpm/php.ini) and restart php
# Find/replace "#cgi.fix_pathinfo=1" to "cgi.fix_pathinfo=0"
# DEVELOPMENT-ONLY: Find/replace ";error_reporting = E_ALL"
echo "Security fix for php.ini"
sudo systemctl restart php7.0-fpm
sudo service php7.0-fpm restart

# Move default site configuration file into sites-available and link to sites-enabled
echo "Setup nginx site configuration files"
sudo rm -f /etc/nginx/sites-enabled/default
sudo ln -s /var/www/unaviamedia/.provision/nginx/site_conf /etc/nginx/sites-available/site_conf
sudo ln -s /etc/nginx/sites-available/site_conf /etc/nginx/sites-enabled/site_conf

# Check nginx configuration and reload
echo "Check nginx configuration and reload"
sudo nginx -t
sudo systemctl reload nginx

# Link html directory into web root
echo "Link repository web files"
sudo ln -s /var/www/unaviamedia/unavia /var/www/html
sudo ln -s /var/www/unaviamedia/constants.php /var/www/constants.php

# Update web directory owner and permissions (set 755 for directories and 644 for files)
#   This will need to be run frequently (after changes) until permission inheritance is set
echo "Update web directory permission"
sudo chown -R "$USER":www-data /var/www
chmod -R u+rwX,go+rX,go-w /var/www

# Create test file
sudo vim /var/www/html/info.php

# Install nodejs and npm, and link nodejs to node (PATH issues)
echo "Install nodejs and npm"
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt install -y nodejs build-essential
sudo ln -s /usr/bin/nodejs /usr/bin/node

# Install gulp globally
echo "Install gulp globally"
sudo npm install --global gulp

# Install node packages
echo "Install node packages"
cd /var/www/html
npm install
