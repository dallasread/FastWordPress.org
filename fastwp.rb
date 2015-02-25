#!/usr/bin/env ruby
require "net/ssh"
require "yaml"

CONFIG = YAML.load_file("config.yaml")
db = user = site = "#{ARGV[0]}".gsub(/[^0-9a-z]/i, "")[0..9]
website = "#{user}.netbuild.co"
website = ARGV[1] unless ARGV[1].nil?

if ARGV[0].nil?
  p "Please pass in ARG #1 (user) and ARG #2 (website - not required)."
else
  home = "/var/www/#{site}"
  public_html = "#{home}/public_html"
  apache = "/etc/apache2/sites-available/#{website}.conf"
  wp_config = "#{public_html}/wp-config.php"

  Net::SSH.start(CONFIG["ip"], CONFIG["admin"]["username"], password: CONFIG["admin"]["password"]) do |ssh|
    [
      # => MySQL Setup
      "mysql -u root -p#{CONFIG["admin"]["password"]} -e 'CREATE DATABASE IF NOT EXISTS #{db};'",
      "mysql -u root -p#{CONFIG["admin"]["password"]} -e 'GRANT ALL PRIVILEGES ON #{db}.* TO #{user}@localhost IDENTIFIED BY \"#{CONFIG["user"]["password"]}\";'",
      "mysql -u root -p#{CONFIG["admin"]["password"]} -e 'FLUSH PRIVILEGES;'",
    
      # => Copy WP
      "cd",
      "wget -N http://wordpress.org/latest.tar.gz",
      "tar xzvf latest.tar.gz",
      "sudo mkdir -p #{public_html}",
      "cp -n ~/wordpress/wp-config-sample.php ~/wordpress/wp-config.php",
      "sudo rsync --ignore-existing -avP ~/wordpress/ #{public_html}",
  
      # => WP Config
      "sed -i 's/database_name_here/#{db}/g' #{wp_config}",
      "sed -i 's/username_here/#{user}/g' #{wp_config}",
      "sed -i 's/password_here/#{CONFIG["user"]["password"]}/g' #{wp_config}",
  
      # => Apache Config
      "sudo cp -n /etc/apache2/sites-available/default #{apache}",
      "sed -i 's/your_email_address/#{CONFIG["admin"]["email"].gsub("@", "\@")}/g' #{apache}",
      "sed -i 's/website_here/#{website}/g' #{apache}",
      "sed -i 's/site_name_here/#{site}/g' #{apache}",
      "sudo a2ensite #{website}",
      "sudo service apache2 restart",
    
      # => Allow Uploads
      "chown -R www-data:www-data #{home}",
    
      # => FTP
      # "sudo useradd -m #{site} -d #{home} -s /bin/false",
      # "echo -e \"#{CONFIG["user"]["password"]}\n#{CONFIG["user"]["password"]}\" | passwd #{site}",
      # "usermod -G filetransfer #{site}",
      # # "chown -R www-data:www-data #{home}",
      # "chown root:root #{home}",
      # # "chown go-w #{home}",
      # "chown -R #{site}:filetransfer #{public_html}",
      # "chown -R www-data:www-data #{public_html}/wp-content",
      # "chmod ug+rwX #{public_html}",
    ].each do |command|
    
      ssh.exec!(command) do |ch, stream, line|
        p "Running command: #{command}"
        p line
      end
    
    end
  
    ssh.close()
  end
end

# SERVER SETUP
# "sudo apt-get install php5-gd"
# "sudo sed -i 's/\#\sHOME=\/home/HOME\=\/var\/www/g' /etc/default/useradd"
# "sudo addgroup --system filetransfer"
# "ln -s /var/www www"
# "vim /etc/apache2/sites-available/default"
# <Virtualhost website_here:443>
#         RewriteEngine On
#         RewriteCond %{HTTP_HOST} ^(?:www\.)?(.*)$ [NC]
#         RewriteRule (.*) http://%1%{REQUEST_URI} [L,R=301]
# </VirtualHost>
# 
# <VirtualHost website_here:80>
#         ServerAdmin your_email_address
#         ServerName website_here
#         ServerAlias www.website_here
#         DocumentRoot /var/www/site_name_here/public_html
# 
#         <Directory /var/www/site_name_here/public_html>
#                 Options Indexes FollowSymLinks MultiViews
#                 AllowOverride All
#                 Order allow,deny
#                 allow from all
#         </Directory>
# </VirtualHost>
# sudo a2enmod rewrite
# mysql_secure_installation
# vim /etc/ssh/sshd_config
# CHANGE: Subsystem sftp internal-sftp
# Match Group filetransfer
#         ChrootDirectory %h
#         ForceCommand internal-sftp
#         AllowTcpForwarding no
#         X11Forwarding no
# Secure & install myphpadmin
# Run this script



# CHANGING DOMAIN
# EDIT "/etc/apache2/sites-enabled/#{site}.conf"
# service apache2 restart
# THE REST FAILED - SO TAKE A BACKUP!
# UPDATE hsn9tl_options SET option_value = REPLACE(option_value, 'http://hc.netbuild.co', 'https://healthcannabis.org');
# UPDATE hsn9tl_postmeta SET meta_value = REPLACE(meta_value, 'http://hc.netbuild.co', 'https://healthcannabis.org');
# UPDATE hsn9tl_posts SET guid = REPLACE(guid, 'http://hc.netbuild.co', 'https://healthcannabis.org');
# UPDATE hsn9tl_posts SET post_excerpt = REPLACE(post_excerpt, 'http://hc.netbuild.co', 'https://healthcannabis.org');
# UPDATE hsn9tl_posts SET post_content = REPLACE(post_content, 'http://hc.netbuild.co', 'https://healthcannabis.org');
# 
# UPDATE hsn9tl_options SET option_value = REPLACE(option_value, 'hc.netbuild.co', 'healthcannabis.org');
# UPDATE hsn9tl_postmeta SET meta_value = REPLACE(meta_value, 'hc.netbuild.co', 'healthcannabis.org');
# UPDATE hsn9tl_posts SET guid = REPLACE(guid, 'hc.netbuild.co', 'healthcannabis.org');
# UPDATE hsn9tl_posts SET post_excerpt = REPLACE(post_excerpt, 'hc.netbuild.co', 'healthcannabis.org');
# UPDATE hsn9tl_posts SET post_content = REPLACE(post_content, 'hc.netbuild.co', 'healthcannabis.org');



### SSL
# buy SSL
# cd /etc/ssl/domains
# mkdir newdomain.com
# cd newdomain.com
# openssl req -newkey rsa:2048 -nodes -keyout domain.key -out domain.csr
# copy CSR to SSLS.com
# Wait for email
# Approve SSL
# Take first Cert in email (Webserver), save as /etc/ssl/domains/newdomain.com/ssl.crt
# Save Intermediate (https://knowledge.rapidssl.com/support/ssl-certificate-support/index?page=content&actp=CROSSLINK&id=SO26459) at /etc/ssl/domains/newdomain.com/intermediate.crt
# Update /etc/apache2/sites-available/website.com.conf with:
# <Virtualhost healthcannabis.org:80>
#         ServerName healthcannabis.org
#         ServerAlias www.healthcannabis.org
#         RewriteEngine On
#         RewriteCond %{HTTP_HOST} ^(?:www\.)?(.*)$ [NC]
#         RewriteRule (.*) https://%1%{REQUEST_URI} [L,R=301]
# </VirtualHost>
# Update /etc/apache2/sites-available/000-ssls.conf with:
# <Virtualhost *:443>
#         RewriteEngine On
#         RewriteCond %{HTTP_HOST} ^(?:www\.)?(.*)$ [NC]
#         RewriteRule (.*) http://%1%{REQUEST_URI} [L,R=301]
# </VirtualHost>
# <VirtualHost healthcannabis.org:443>
#         ServerAdmin dallas@excitecreative.ca
#         ServerName healthcannabis.org
#         ServerAlias www.healthcannabis.org
#         SSLEngine on
#         SSLProtocol all
#         SSLCertificateFile /etc/ssl/domains/healthcannabis.org/ssl.crt
#         SSLCertificateKeyFile /etc/ssl/domains/healthcannabis.org/domain.key
#         SSLCACertificateFile /etc/ssl/domains/healthcannabis.org/intermediate.crt
#         DocumentRoot /var/www/hc/public_html
#         RewriteEngine on
# 
#         <Directory /var/www/hc/public_html>
#                 Options Indexes FollowSymLinks MultiViews
#                 AllowOverride All
#                 Order allow,deny
#                 allow from all
#         </Directory>
# </VirtualHost>
# sudo service apache2 restart
# change domain SQL (above)