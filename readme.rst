######################
Deploy at Cloud Server
######################

**************************
Resources at Alibaba Cloud
**************************
-  ( OS Ubuntu 20.04 Server )
-  ( 1 vCPU 1 GiB ) 
-  ( Disk 40 GB ) 
-  ( Public IP )

*******************
Website Environment
*******************
-  CodeIgniter 3.1.1
-  Apache/nginx
-  PhpMyadmin
-  PHP v 7.2
-  Mysql

*******************

*******************

****************
Pre-Installation
****************
-  apt update
-  apt install git apache2 mysql-server phpmyadmin -y
-  apt install php php-common php-pspell php-curl php-gd php-intl php-mysql php-xml php-xmlrpc php-ldap php-zip php-soap php mbstring libapache2-mod-php -y

****************
Check Status
****************
-  systemctl status mysql 
-  systemctl status apache2 

****************
Database Setup
****************

-  sudo mysql
-  ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY ‘admin’;
-  GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost’;
-  FLUSH PRIVILEGES;
-  exit
-  mysql -u root -p
-  password : admin
-  exit


****************
Restart services
****************
-  systemctl restart apache2
-  systemctl restart mysql



****************
Deploy Website
****************
*  vim /etc/apache2/sites-available/000-default.conf
* <VirtualHost *:80>			
*       ServerAdmin webmaster@localhost
*       DocumentRoot /var/www/html	
*       <Directory "/var/www/html">	
*       Options FollowSymLinks
*       AllowOverride All
*       Require all granted
*       </Directory>
*	ErrorLog ${APACHE_LOG_DIR}/error.log
*       CustomLog ${APACHE_LOG_DIR}/access.log combined
* </VirtualHost>
 







*  vim /etc/apache2/apache2.conf
*  <Directory /var/www>
*        Options Indexes FollowSymLinks
*        AllowOverride All
*        Require all granted
*  </Directory>
-  Include /etc/phpmyadmin/apache.conf






-  cd /var/www
-  rm -r html
-  git clone https://github.com/dharmasitepu/sistem-akademi
-  mv sistem-akademi html
