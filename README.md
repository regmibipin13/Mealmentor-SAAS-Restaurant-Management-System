---
id: kmfkj67d
title: Mealmentor - Multivendor Restaurant Management Solution
file_version: 1.1.3
app_version: 1.12.5
---

Mealmentor can be installed through two ways

1.  UI Installation

2.  Manual Installation

# UI Installation:

## Unzipping the Project:

Unzip the main application file and place it in your root path of your domain or localhost

Visit the url {appUrl}/install and you will see the following view

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2F544321f8-1518-41a9-b6f4-70ea9adbcc15.png?alt=media&token=91a7110d-42ae-4939-9130-fb92fff11b28" style="width:'100%'"/></div>

<br/>

## Checking Requirements:

Click on Check Requirements to Continue Installation and you will see the following view

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2F7e53ca19-2e0d-4f8f-8649-2ca67e7134c0.png?alt=media&token=e3a3ab66-d39c-4ca9-a88f-1878a4bd6abe" style="width:'100%'"/></div>

<br/>

Now it will check all the requirements of the project for your system . If all the requirements are fulfilled you can continue otherwise you can install the necessary requirements .

<br/>

## Checking Permissions:

After Installing Necessary requirements you can click on Check Permissions to check permission of your project in the system

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2F47ace788-db50-4688-872a-7c6aaa373087.png?alt=media&token=c88357ff-1734-4f28-9fe8-2a837b63b7e5" style="width:'100%'"/></div>

<br/>

Make sure all the permissions are granted. If not granted you can use several methods to grant permissions

## Environment Configuration:

After granting permissions you can continue configuring the environment variables

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2F03b2c1ab-6633-4736-a2ac-f5f0b2103e8b.png?alt=media&token=c968b2c4-a6a8-462c-b824-db0a8b1de401" style="width:'100%'"/></div>

<br/>

You can either go for Form Wizard setup or classic text editor way for configuring the environment variables . As most of the users may not know technical way of doing things you can just go for form wizard setup

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2F837399b4-33fe-4a02-b1d1-db8d02e94f5b.png?alt=media&token=3d42122a-85bd-421c-a3bc-31d2644b454b" style="width:'100%'"/></div>

<br/>

Make sure to enter all valid data in the environment configuration .

<br/>

## Database Configuration:

After Configuration of the environment, you can setup the database

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2Fd5637b77-a32e-4cf3-8a06-90f5bd8a8a8d.png?alt=media&token=d8eb686a-a002-46d7-b0c2-def6652baa4d" style="width:'100%'"/></div>

<br/>

Enter all the correct details of the database otherwise you have encountered various problems accessing the application

<br/>

## Application Details Configuration (Optional):

After Configuring the database you can continue setting up the application

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2Fda9e13aa-4243-45e7-9248-9482abebaec9.png?alt=media&token=6a00a983-3a24-4c36-9641-573bb91442a5" style="width:'100%'"/></div>

<br/>

Here you can configure other necessary details like mail server details, pusher details etc.

This is not so important configurations at all for the system to run if you are doing customizations in the application for broadcasting things and all you can configure pusher but you can just leave this things as it is

<br/>

## Finishing the Installation:

Finally after all the configuration you can click on Install to finish your installation

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBbWVhbG1lbnRvciUzQSUzQXJlZ21pYmlwaW4xMw%3D%3D%2Fb0ccbe7c-0233-4069-b44f-f8802a669210.png?alt=media&token=ad902867-eecd-4890-98e4-2201ea721d54" style="width:'100%'"/></div>

<br/>

After Finishing Installation you can just click on Exit and you will be redirected to the application

<br/>

# Manual Installation:

<br/>

## Unzipping the File:

Unzip the main application file and place it in your localhost or cpanel .<br/>
Now open terminal and navigate to the project path and follow other steps

Note: Terminal may not be available in your server incase of shared host.You can contact your host provider for enabling the terminal or you can also use other third party tools like Termius also.

## Updating the Dependencies:

To install/update dependencies you can run the following command on the terminal:

`composer update` OR `composer install`

<br/>

## Database Configuration:

After updating the dependencies you can setup your database .

Open .env file from your root application and change the necessary credentials<br/>

<br/>

Change the APP Settings and DB Settings according to your system
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 .env.example
```example
1      APP_NAME=Laravel
2      APP_ENV=local
3      APP_KEY=
4      APP_DEBUG=true
5      APP_URL=http://localhost
6      
7      LOG_CHANNEL=stack
8      LOG_DEPRECATIONS_CHANNEL=null
9      LOG_LEVEL=debug
10     
11     DB_CONNECTION=mysql
12     DB_HOST=127.0.0.1
13     DB_PORT=3306
14     DB_DATABASE=mealmentor
15     DB_USERNAME=root
16     DB_PASSWORD=
```

<br/>

<br/>

## Migrating the Database:

After configuring the application details, now you can migrate the database

To migrate database run:

`php artisan` `migrate`<swm-token data-swm-token=":_ide_helper.php:14702:7:7:`        public static function migrate($destroy = false)`"/>

<br/>

You can also seed some fake data that will be inserted so that you have some sample data running:

To seed the data run

`php artisan db:seed`

<br/>

You can also do the following two steps in one you<br/>
Run:

`php artisan migrate --seed`

<br/>

## Generating the Application Key:

To generate the application key run :

`php artisan key:generate`

<br/>

## Ignoring the UI Installation:

Although you have manually install the application but still `/install` url will be available in your application

To disabled this just add the file `installed.txt` in your storage folder with = following content

`Laravel Installer successfully INSTALLED on 2023/06/30 08:24:15am`

Date can be changed accordingly.

<br/>

## Finishing the installation:

Now you can visit your application url.

<br/>

