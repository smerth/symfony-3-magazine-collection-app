# Symfony Demo - Magazine Catalog App

## Setup App

### Download the github repo

```bash
git clone https://github.com/smerth/symfony-3-magazine-collection-app.git
```

### Setup empty database

During the install you will be asked to update the credentials for the database and localhost settings.

Set up your empty database now so you have the info ready when you are prompted.

### Install dependancies

```bash
composer install
```

enter your database settings at the prompts and composer will finish the installation of the app dependancies.

At the end of the install you should get some green lights

```bash
[OK] Cache for the "dev" environment (debug=true) was successfully cleared.
```

and 

```bash
[OK] All assets were successfully installed.
```

At this point if you run the server

```bash
bin/console server:run
```

you will get an ugly issue page…  That's because you are trying to load the app from an empty database (the issue page is complaining about the lack of tables in the database!)

```bash
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'symfony-magazine-app-demo.issues' doesn't exist
```

Luckily, Symfony uses the great Doctrine ORM



First configure the Doctrine settings

@ config.yml

```yaml
# Doctrine Configuration
doctrine:
    dbal:
        driver:   pdo_mysql
        host:     "localhost"
        port:     "3306"
        dbname:   "symfony-magazine-app-demo"
        user:     "YOUR_DB_USERNAME_HERE"
        password: "YOUR_PASSWORD_HERE"
        charset:  UTF8
        # if using pdo_sqlite as your database driver:
        #   1. add the path in parameters.yml
        #     e.g. database_path: "%kernel.root_dir%/data/data.db3"
        #   2. Uncomment database_path in parameters.yml.dist
        #   3. Uncomment next line:
        #     path:     "%database_path%"
```



 so let's use that to build the database according to the Repositories defined in the app.





```bash
bin/console doctrine:schema:create
```

That should create the necessary database structure to run the app.

Start the server

```bash
bin/console server:run
```

Voila! (a nod to  the origins of Symfony!) 

The app is up and running and ready for you to populate the magazine catalog with Publications (e.g.: Sports Illustrated, London Haberdasher's New Mothly) and Issues from those publications.

## Console commands

Clear cache in dev mode

```bash
bin/console cache:clear --env=dev
```

Run the dev server

```bash
bin/console server:run
```



## Build Notes

This app runs the ```Uarsymfonybundle``` which is named after the Lynda.com course "Up and running with Symfony 2 for PHP."

The course project employs Bootstrap for style but this build employs Foundation.   The course project is built with Symfony2, this repo is built with Symfony 3.



============================

A Symfony project created on March 21, 2016, 2:01 pm.


