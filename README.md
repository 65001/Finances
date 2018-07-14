# Welcome To Finances

Finances, is an open source MIT Licensed application that 
aims to help you track how and when you spend your money.
Currently it is missing budgeting features but that may be added
in the future.  AS this program is in development there 
may be breaking changes. If upgrading from a previous version you 
must download and run all previous 'patch.sql' changes before 
continuing.

# Install Guide for Windows
1. Download [XAMPP] (https://www.apachefriends.org/index.html).
2. Run the XAMPP installer
3. After the install is finished open the XAMPP Control Panel as administrator.
4. Under the Apache Module enable the Services checkbox.
5. Under the Apache Module click the Config button and click <strong>Apache (httpd.conf)</strong>
6. Put the following code into the file and save: 


	``` xml
	<Directory "C:/xampp/htdocs/Finances">
		Options Indexes FollowSymLinks Includes ExecCGI
		AllowOverride All
		Require all granted
		<IfModule mod_rewrite.c>
			#Code from https://www.digitalocean.com/community/questions/apache-remove-php-and-html-file-extensions-using-mod_rewrite-in-httpd-conf
			#Foreign Code
			RewriteEngine On
			RewriteCond %{REQUEST_FILENAME}.php -f
			RewriteRule (.*) $1.php [L]
			RewriteCond %{REQUEST_FILENAME}.html -f
			RewriteRule (.*) $1.html [L]
		</IfModule>
	</Directory>
	```
	
7. Download the Finances.zip
8. Unzip the Finances folder to `C:/xampp/htdocs/Finances`
9. Goto `http://localhost/Finances/Setup/setup' and wait til setup is complete.

# Specs
Finances runs on top of PHP and SQLite. 
The recommended web server to use is [XAMPP](https://www.apachefriends.org/index.html), which is a 
cross platform Apache distribution that contains 
Apache, MariaDB, PHP, and Perl.