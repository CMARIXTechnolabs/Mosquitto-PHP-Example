# Mosquitto-PHP-Example #

<a target="_blank" href="LICENSE"><img src="https://img.shields.io/badge/licence-MIT-brightgreen.svg" alt="license : MIT"></a>
<a target="_blank" href="https://www.cmarix.com/php-opensource-development-services.html"><img src="https://img.shields.io/badge/php-%5E5.3-blue.svg" alt="php : ^5.3"></a>
<a target="_blank" href="https://www.cmarix.com/node-js-web-development-company.html"><img src="https://img.shields.io/badge/environment-node-blue.svg" alt="environment : node"></a>

This is an example of Mosquitto™ MQTT client library with PHP to use in the chat message. Also Host the service continues in the background using PM2 tools of Node.

## Requirements ##
- PHP 5.3+
- libmosquitto 1.2.x+
- Node 11.0
- PM2

## Mosquitto Broker Installation ##

Please follow the below steps to install the Mosquitto Broker

1. Install Mosquitto Broker

    	> sudo apt-get update
    	> sudo apt-get install mosquitto

2. Install Mosquitto Clients
    
    	> sudo apt-get install mosquitto-clients
    
3. Test mosquitto MQTT service using CLI
	
	a. Subscribe to topic "test"(open terminal and write following command)
    
    	> mosquitto_sub -t "test"
    
	b. Publish a message to topic "test"(open another terminal and write following command)
    
    	> mosquitto_pub -m "message from mosquitto_pub client" -t "test"
    
4. Secure Mosquitto service using password
	
	a. Set the username and password of the mosquitto server

    	> sudo mosquitto_passwd -c /etc/mosquitto/passwd username
    	> Password: password

	b. Configure credentials for Mosquitto on ubuntu
     
    	> sudo nano /etc/mosquitto/conf.d/default.conf

	This will create empty file for the configuration. Add following lines into this configuration file and save.
	
		> allow_anonymous false
		> password_file /etc/mosquitto/passwd

5. Restart Mosquitto server to apply changes.
    
    	> sudo systemctl restart mosquitto

6. Test the Mosquitto using secure connection
	a. Subscribe to topic "test" using credentials
    
    	> mosquitto_sub -t "test" -u "username" -P "password"
	
	b. Publish a message to topic "test" using credentials
	    
    	> mosquitto_pub -t "test" -m "message from mosquitto_pub client" -u "username" -P "password"

## Setup Message application  ##

Setup the MQTT message application is just 5 minute of process.

- Download the "**Example**" folder. 
- Change the configuration in config.php file.

    	$host   = "192.168.1.107"; // Server IP on which MQTT is configured; 
    	$port 	= 1883; // default port is 1883. 
    	$username = "dave"; // if MQTT is configured secured 
    	$password = "ctpl@dev"; // if MQTT is configured secured

- Run the application. Please follow below steps to run application

##  Run the application  ##

Below extensions are required for Mosquitto

1. Install dependencies
    	
    	> sudo apt-get install php-pear
    	> sudo apt-get install php5-dev(latest php version)
    	> sudo apt-get install libmosquitto-dev
    	> sudo pecl install Mosquitto-alpha

2. Go to **mods-available** directory to add mosquitto configuration file.
    	
    	> cd /etc/php5/mods-available

3. Create “**mosquitto.ini**” file using any text editor like vi/nano and add following line and save changes
    	
    	extension=mosquitto.so

4. To check if the library is installed run the follwoign command
    	
    	> dpkg -l | grep mosquitto

5. After that enable the **mosquitto** module
    	
    	> sudo php5enmod mosquitto

	OR (for latest version use below code)
    	
    	> sudo phpenmod mosquitto

6. Restart apache server
    	
    	> sudo service apache2 restart

7. If you get below warning then restart the computer
    	
    	> root@piserver:/etc/php5/mods-available# sudo service apache2 restart

    	Warning: Unit file of apache2.service changed on disk, 'systemctl daemon-reload' recommended.
8. Open the terminal. Run the subscribe file using PHP to continue listen the message in MQTT server. Please do not close the terminal, if the terminal close then the service is stopped to receive the message.    
    
    	> php subscribe.php

9. Open the another terminal and send the message and check the message is received in the subscribe terminal. We have created "publish.php" file to test the message sending
    
    	> php publish.php
	
	OR you can directly send the message.Just make sure the topic name is same as you have configured in the subscribe.php file. Here the topic name is "mqttdemo/chat"
    	   
    	> mosquitto_pub -t "mqttdemo/chat" -m "message from mosquitto_pub client" -u "dave" -P "password"


## Screenshots ##
 
Server Terminal:

![Mqtt-server](https://www.cmarix.com/git/php/Mosquitto-PHP-Example/Mqtt-server.png)

Client Terminal:

![Mqtt-client](https://www.cmarix.com/git/php/Mosquitto-PHP-Example/Mqtt-client.png)


##  Run the server terminal in background ##

To continue running the application, it required to open the terminal. To overcome with this, use the [PM2 - advanced Node.js process manager](http://pm2.keymetrics.io/).

1. Install node and npm and then run the following command to install PM2
    	
    	npm install pm2@latest -g

2. To continue running the subscribe.php file in PM2, run the following command. 
    	
    	pm2 start subscribe.php --name mqtt // named the service 

	![PM2-start](https://www.cmarix.com/git/php/Mosquitto-PHP-Example/PM2-start.png)

## Let us know! ##
We’d be really happy if you sent us links to your projects where you use our component. Just send an email to [biz@cmarix.com](mailto:biz@cmarix.com "biz@cmarix.com") and do let us know if you have any questions or suggestion regarding MQTT messaging in PHP.

P.S. We’re going to publish more awesomeness examples on third party libraries, coding standards, plugins etc, in all the technology. Stay tuned!

## Stay Socially Connected ##

Get more familiar with our work by visiting few of our portfolio links.

[Portfolio](https://www.cmarix.com/portfolio.html) | [Facebook](https://www.facebook.com/CMARIXTechnoLabs/) | [Twitter](https://twitter.com/CMARIXTechLabs) | [Linkedin](https://www.linkedin.com/company/cmarix-technolabs-pvt-ltd-) | [Behance](https://www.behance.net/CMARIXTechnoLabs/) | [Instagram](https://instagram.com/cmarixtechnolabs/) | [Dribbble](https://dribbble.com/CMARIXTechnoLabs) | [Uplabs](https://www.uplabs.com/cmarixtechnolabs)

Please don’t forget to follow them.

## License ##

	MIT License
	
	Copyright © 2019 CMARIX TechnoLabs
	
	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.
