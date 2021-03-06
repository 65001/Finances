# Welcome To Finances

Finances, is an open source MIT Licensed application that 
aims to help you track how and when you spend your money.
Currently it is missing budgeting features but that may be added
in the future.  

# Install Guide for Windows
1. Download [XAMPP](https://www.apachefriends.org/index.html).
2. Run the XAMPP installer
3. After the install is finished open the XAMPP Control Panel as administrator.
4. Under the Apache Module enable the Services checkbox.
5. Under the Apache Module click the Config button and click <strong>Apache (httpd.conf)</strong>
6. Navigate to the following tag:
   ``` xml
   <Directory "C:/xampp/htdocs">
		....
   </Directory>
   ```
7. Put the following code into the file after the end of the code from step 6.
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
	and save.
	
8. Download the Finances.zip
9. Unzip the Finances folder to `C:/xampp/htdocs/Finances`
10. Verify that all folders and files are directley under
the Finances Folder. 
11. Goto http://127.0.0.1/Finances/Setup/setup and wait til setup is complete.
12. If you are using your computer on a non-home network apply the 
restricting to one machine guide below.

# Update Guide
1. Download the Finances.zip
2. Unzip the Finances folder to `C:/xampp/htdocs/Finances`
3. Wait til the Setup is Completed text appears.
4. Refresh page, if no patches are applied you are done! If patches are applied repeat step 3 and 4 til no more patches are applied.

# Restricting to one machine
In the event your in college or otherwise using your machine on a non-trusted network
you <strong>MUST</strong> restrict your server to 127.0.0.1 .
To do this you must do the following:
1) Open XAMPP Control Panel as administrator.
2) Under the Apache Module click the Config button and click <strong>Apache (httpd.conf)</strong>
3) Navigate to the tag 
	``` xml 
		<Directory "C:/xampp/htdocs">
	```
4) In that tag change <strong>allow from all</strong> to <strong>allow from 127.0.0.1</strong>
5) Add this line: <strong>deny all</strong>
6) Change <strong>Order allow,deny </strong> to <strong>Order deny,allow</strong>
7) Restart Apache by stopping the service and starting the service again. 

# Specs
Finances runs on top of PHP and SQLite. 
The recommended web server to use is [XAMPP](https://www.apachefriends.org/index.html), which is a 
cross platform Apache distribution that contains 
Apache, MariaDB, PHP, and Perl.