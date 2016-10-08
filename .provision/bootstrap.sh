# Create new sudo user and sign in with the account
sudo adduser development
sudo usermod -aG sudo development
su development

# Update repositories and upgrade available packages
echo "Update repositories and upgrade available packages"
sudo apt update -y
sudo apt upgrade -y

# Install git
echo "Install miscellaneous programs"
sudo apt install -y git vim curl screen

# Install nginx
echo "Install nginx"
sudo apt install -y nginx

# Change permissions for the web directory and remove default files
echo "Change permissions for web root and remove default files"
sudo chown -R development:www-data /var/www
cd /var/www
rm -rf html

# Clone git repository for site
echo "Clone site repository"
git clone https://github.com/unaviamedia/unaviamedia.git

# Install mysql
echo "Install mysql"
sudo apt install -y mysql-server

echo "Secure mysql installation"
sudo mysql_secure_installation

# Install php and mysql handling
echo "Install PHP and MySQL handling"
sudo apt install -y php-fpm php-mysql

# Run some configuration changes to php.ini and restart php
# Find/replace "#cgi.fix_pathinfo=1" to "cgi.fix_pathinfo=0" in "/etc/php/7.0/fpm/php.ini"
echo "Security fix for php.ini"
sudo systemctl restart php7.0-fpm
sudo service php7.0-fpm restart

# Move default site configuration file into sites-available and link to sites-enabled
echo "Setup nginx site configuration files and link to sites-enabled"
sudo rm -f /etc/nginx/sites-enabled/default
sudo ln -s /var/www/unaviamedia/.provision/nginx/site_conf /etc/nginx/sites-available/site_conf
sudo ln -s /etc/nginx/sites-available/site_conf /etc/nginx/sites-enabled/site_conf

# Check nginx configuration and reload
echo "Check nginx configuration and reload"
sudo nginx -t
sudo systemctl reload nginx

# Link html directory into web root
echo "Link repository web files into web root"
sudo ln -s /var/www/unaviamedia/unavia /var/www/html
sudo ln -s /var/www/unaviamedia/constants.php /var/www/constants.php

# Update web directory owner and permissions (set 755 for directories and 644 for files)
#   This will need to be run frequently (after changes) until permission inheritance is set
echo "Update web directory permission"
sudo chown -R "$USER":www-data /var/www
chmod -R u+rwX,go+rX,go-w /var/www

# Create file to test php configuration
echo "Create file to test PHP configuration"
echo "<?php phpinfo(); ?>" > /var/www/html/info.php

# Install composer to manage PHP packages and test insallation
echo "Install composer to manage PHP packages"
wget https://getcomposer.org/installer
sudo php installer --install-dir=/usr/local/bin --filename=composer
composer

# Install nodejs and npm
echo "Install nodejs and npm"
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt install -y nodejs build-essential

# Install gulp globally
echo "Install gulp globally"
sudo npm install --global gulp

# Prepare for project package installation
echo "Prepare for project package installation"
cd /var/www/html

# Install composer packages
echo "Install composer packages"
composer require phpmailer/phpmailer
#composer require league/oauth2-google
composer install

# Install node packages
echo "Install node packages"
npm install

# Compile CSS
echo "Compile CSS"
gulp sass
