# Getting Started with Home Inventory Web (Dev and Test)
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites (Linux workstation)
- You have sufficient rights to install packages using sudo
- You are familiar with Terminal and with these commands ls, cd, cp, rm
- Note: this step-by-step has been developed using Lubuntu 16.04.3 LTS amd64

## Prerequisites (Windows workstation)
- You have sufficient rights to install on the drive
- Note: this step-by-step has been developed using Window 10 Pro 1909

## Install on Linux workstation, single user mode
### 1. Download the HomeInventoryWeb code archive [from Git](https://github.com/sroccoli1/homeinventoryweb) unpack it and let it wait until step 5 .
### 2. Install a [LAMP](https://en.wikipedia.org/wiki/LAMP_%28software_bundle%29) (Linux-Apache-MySQL-PHP) server : 
Follow [these instructions from step 1 to 3 in french](https://doc.ubuntu-fr.org/lamp#installation) or these ones translated to english:
1. Install the LAMP pile packets for Apache, PHP (latest version) and MySQL: `sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql`
2. Install these additional PHP modules: `sudo apt install php-curl php-gd php-intl php-json php-mbstring php-xml php-zip`
Description of the packets:
- the `apache2` packet installs HTTP Apache 2 server (it is a libapache2-mod-php dependency).
- the `php` packet installs a PHP interpreter (it is only a libapache2-mod-php dependency).
- the `libapache2-mod-php` installs the Apache Php module
- the `mysql-server` packet installs MySQL database system.
- the `php-mysql` installs the php modules for interacting with MySQL or MariaDB
3. Once installed, open the following links in your browser:
- `http://127.0.0.1/`
- `http://localhost`
4. If it is displayed « It works! », then your LAMP sever is correctly installed. Depending on the installed version, it may be displayed a page entitled « Apache2 Ubuntu Default Page ».

**With this install method you get a preconfigured and running LAMP server, displaying the content of the folder /var/www/html (by default the file index.html or index.php).**

> It's a good idea to check [LAMP known issues](https://help.ubuntu.com/community/ApacheMySQLPHP#Known_problems) telling about Skype incompatibility. 

### 3. Config LAMP :
#### 1. (Optional) Configuring the automatic start configuration [following these instructions in french](https://doc.ubuntu-fr.org/lamp#configuration_du_demarrage_automatique_de_lamp) or these translated into english:
By default, Apache and MySQL or MariaDB start automatically when you turn on your computer.
##### Prevent LAMP from starting at startup

`sudo systemctl disable apache2`

  And for mysql:
`sudo systemctl disable mysql`

  Then you can manually start them up. 
  For Apache :
`sudo systemctl start apache2`

  and pour MySQL:

`sudo systemctl start mysql`

  The available commands are `systemctl start`, `systemctl stop`, et `systemctl restart`.

##### Reactivate automatic startup 

It's easy:
`sudo systemctl enable apache2`
`sudo systemctl enable mysql`

#### 2. Create working directory
  1. Create working directory, following the section [Création du répertoire de travail](https://doc.ubuntu-fr.org/tutoriel/lamp_repertoires_de_travail#mise_en_place_d_un_espace_public) or from this section [Virtual Hosts](https://help.ubuntu.com/community/ApacheMySQLPHP#Virtual_Hosts). 
  2. At this point, you can open index.html in your browser, pointing at localhost.
  3. Put the code in this working directory.
  4. Delete the previously created index.html.
  5. At this point, you can open HomeInventoryWeb in your browser, pointing at localhost.
#### 3. Set up the database :
  1. Follow [Create a DB and its associated user (tutorial in french)](https://doc.ubuntu-fr.org/mysql#creer_une_base_de_donnees_et_un_utilisateur_qui_lui_est_associe) or follow in this order at the page After installing MySQL [After installing MySQL](https://help.ubuntu.com/community/ApacheMySQLPHP#After_installing_MySQL) the sections:
[1. [Set mysql root password](https://help.ubuntu.com/community/ApacheMySQLPHP#Set_mysql_root_password),
[2. [Create a mysql database](https://help.ubuntu.com/community/ApacheMySQLPHP#Create_a_mysql_database),
[3. [Create a mysql user in the section](https://help.ubuntu.com/community/ApacheMySQLPHP#Create_a_mysql_user) 
  2. Create the DB tables : in your browser go to localhost, you’ll see a list of files. Click on createtables.php to create the tables.
### Congrats, you can start testing HomeInventoryWeb!

## Uninstall (Linux)
(Coming soon)

## Install on Windows 10 workstation, single user mode
(Coming soon)

## Uninstall (Windows)
(Coming soon)
