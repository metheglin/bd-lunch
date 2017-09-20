# ApparelCloud DevelopCentral (CakePHP)

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

This application developed with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Requirements

1. HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required.
2. PHP 5.6.0 or greater (including PHP 7.1).
3. Mysql as Datasource.
4. ```mbstring``` and ```intl``` PHP extension should enable 


## Installation

- Clone the repository .

```
APPNAME=your-awesome-app

git clone everforth@everforth.git.backlog.jp:/BLOG_POTAL/apparelcloud-develop-central.git $APPNAME
cd $APPNAME

```

- Now run [Composer](http://getcomposer.org/doc/00-intro.md) update `composer update`.
it will include the dependencies


## Project Environment
- Set `dev` for development and `prod` for Production mood in `config/env.php`


## Configuration
- First of all, please copy environment dependent configs

```
cp -i config/env.php.example config/env.php
cp -i config/app_dev.php.example config/app_dev.php
```

- Make a empty mysql database for this project

- Add/edit `config/app_dev.php` or `config/app_prod.php` and setup the `'Datasources'=> 'default'` connection necessary configuration like

```
'username' => 'mysql user name',
'password' => 'mysql password',
'database' => 'mysql database name',
```

- Set configuration in `config/app_dev.php` or `config/app_prod.php` and setup the `'App'` array necessary configuration like

```
'BacklogApiKey' => 'BACKLOG_API_KEY',
'BacklogPojectId' => 'BACKLOG_PROJECT_ID',
'ChatWorkApiKey' => 'CHATWORK_API_KEY',
'ChatWorkGropId' => 'CHATWORK_GROUP_ID',
```

- Now need to create symbolic link for plugins assets `bin/cake plugin assets symlink`


### Database import from sql files

- find the latest database from `config/schema/xxxxx.sql` and import into the project datasource


### Database import by command

- Now update the database schema for applicaiton by running `bin/cake migrations migrate` [More migrate Command](https://book.cakephp.org/3.0/en/migrations.html#migrate-applying-migrations)

- Now make some sample data from seeder by running `bin/cake migrations seed` [More Seeder Command](https://book.cakephp.org/3.0/en/migrations.html#seed-seeding-your-database)

- For getting more Please visite [Migrations](https://book.cakephp.org/3.0/en/migrations.html)


# Permissions
CakePHP uses the `tmp` directory for a number of different operations. Model descriptions, cached views, and session information are a few examples. The `logs` directory is used to write log files by the default FileLog engine.
- set Permission in `/tmp` and `/logs` recursively  (if not present need create those 2 directory)

if everything is ok then it's ready to use


# How TaskType Template add
Task type Template have 2 types of data 
- From database field
- From `file` templete

### Logic 
`IF` file exists `THEN` get template content from `File`
`Else` get content from `Database`

### Add template
`TemplatePath => src/Template/Element/tasktype/{$task_type_id}.ctp`
Here sample file name will be `5.ctp` where `5` is Task Type ID and **extension** is `.ctp`

For using variable please check sample file => `src/Template/Element/tasktype/0_sample_variable.ctp`



# Deploy staging/production

## PHP Install

```
yum --enable-repo=remi install php56-php-intl
  # find / -name "intl.so"
  # ls -l /opt/remi/php56/root/usr/lib64/php/modules/intl.so

php -i | grep php.ini
  # Loaded Configuration File => /etc/php.ini
sudo vi /etc/php.ini
  # ;;;;;;;;;;;;;;;;;;;;;;
  # ; Dynamic Extensions ;
  # ;;;;;;;;;;;;;;;;;;;;;;
  # extension=/opt/remi/php56/root/usr/lib64/php/modules/intl.so
```

## Create Database

```
create database devcentral_staging default character set 'utf8';

create user 
  'devcentral_user'@'localhost' 
identified by 
  'rv_devcentral'
;

set password for 'devcentral_user'@'localhost' = password('rv_devcentral');

grant 
  all 
on 
  `devcentral_staging`.* 
to 
  'devcentral_user'@'localhost'
;
```

Set under database information.

```
'username' => 'devcentral_user',
'password' => 'rv_devcentral',
'database' => 'devcentral_staging',
```

```
mysql -udevcentral_user -p devcentral_staging
rv_devcentral
```

## Restart php server

```
sudo service php-fpm restart
```

## How to Check Backlog Data

- Access to Issue Page
-- https://everforth.backlog.jp/add/BLOG_POTAL
- Check response of the below XHR
-- https://everforth.backlog.jp/GetEditIssueTemplate.action?projectId=1073832170&_=1504259401774


