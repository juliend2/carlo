# 2025-03-08

# vhost example

    <VirtualHost *:80>
        ServerAdmin julien@carlo.social
        DocumentRoot "/srv/http/carlo"
        ServerName carlo.social
        ErrorLog "/var/log/httpd/carlo.social-error_log"
        CustomLog "/var/log/httpd/carlo.social-access_log" common
    </VirtualHost>

# request example

GET:
    http://carlo.social/.well-known/webfinger?username=julien

shows:

    /srv/http/carlo/index.php:7:
    array (size=2)
      '_well-known/webfinger' => string '' (length=0)
        'username' => string 'julien' (length=6)



