<h1 align="center">
  PHP Webapp
</h1>
<h4 align="center">
  Mock PHP Webapp to emulate SAML2.0 behavior for authentication and authorization
</h1>

## Apache

My configuration of the webpage makes use of Apache's webserver via [xampp](https://www.apachefriends.org/download.html). I have configured a basic virtual host for the webpage with SSL enabled so we can make use of client-side certificate authentication.

General virtual host setup in httpd-ssl.conf:
```
Listen 8443
<VirtualHost _default_:8443>
  DocumentRoot "C:/xampp/htdocs/your-project-directory"
  ServerName localhost 
  ServerAdmin admin@example.com
  ErrorLog "C:/xampp/apache/logs/error.log"
  TransferLog "C:/xampp/apache/logs/access.log"
  SSLEngine on
</VirtualHost>
```

To have SSL working as intended we need to create a server certificate & key alongside with a client certificate and key. Both of this can be done using the [openssl library](https://www.openssl.org/docs/). For my purposes, I have self-signed the certificate using a CA that I generated. From there you can pass in the path or the direct location to the certificate using some parameters in our Apache configuration.

Example in our virtual host setup:

```
SSLCertificateFile "path to server certificate"
SSLCertificateKeyFile "path to server certificate key"
SSLCACertificateFile "path to PEM file containing all client side information (certificates, keys, associated CA's, etc)"
```
*Note: you must install the client certificate along with the CA used during these processses onto your local machine*

## Browser

Most browsers won't recognize your client's certificate or the CA that you passed in automatically. Configure your browser so that it trusts your CA and knows where the client certificate is located on your machine.
If you made it here, then you should be able to go onto your designated web server via SSL (https) and the browser should warn you (if you ended up using a self-signed certificate) and by bypassing this you can pass in the corresponding certificate that you use (if needed). From there you should have access to the home page of your web app. You can verify if the SSL if working once again by looking besides the URL at the top of your browser. 

## PHP

Now that that configuration is set up. You can proceed onto creating the authentication layers of your web app. To make sure of the client certificate values you can pass in the parameter

```
 SSLOptions +StdEnvVars
```

which allows you to make use of the following [environment variables](https://httpd.apache.org/docs/2.2/mod/mod_ssl.html#envvars).
