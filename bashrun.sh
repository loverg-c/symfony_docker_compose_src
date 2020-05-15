#!/bin/bash

clearcache()
{
  rm -rf var/cache/*
  rm -rf var/log/*
}

install()
{
  afterBuild;
  clearcache;
  return 0
}

buildproject()
{
  install;
  testAll;
  clearcache;
  return 0
}

afterBuild()
{
  vendorInstall;
  routes_js_generate;
  resetDB;
  clearcache;
  return 0
}

vendorInstall()
{
  rm -rf vendor/*
  clearcache;
  umask 0002;
  composer install
  return 0
}

routes_js_generate()
{
   php bin/console fos:js-routing:dump --format=json --target=assets/config/fos_js_routes.json
}

vendorUpdate()
{
  rm -rf vendor/*
  clearcache;
  umask 0002;
  composer update
  return 0
}

reloadFixtures()
{
  echo "Begin reload fixtures";
  php bin/console hautelook:fixtures:load -n -vvv
  echo "End reload fixtures";
  return 0
}

updateDB()
{
  echo "Begin updateDb";
  migrateDB
  echo "End updateDb";
  return 0
}

dbVersion()
{
   php bin/console doctrine:migrations:status | sed -n 's/.*Current Version:.*(//p' | cut -d ')' -f 1
}

migrateDB()
{
  echo "Begin migrateDb";
  php bin/console doctrine:migrations:migrate $([ "$1" ] && echo "$1" || echo "") --no-interaction
  echo "End migrateDb";
  return 0
}

executeDB()
{
  echo "Begin executeDB";
  php bin/console doctrine:migrations:execute "$1" --"$2" --no-interaction
  echo "End executeDB";
  return 0
}

generateMigrationFile()
{
  echo "Begin generation";
  php bin/console doctrine:migrations:diff --no-interaction
  echo "End generation";
  return 0
}

generateSQLMigration()
{
  version=$2;
  if [[ "$1" == "down" ]]
  then
      dir_name=$version;
  else
      dir_name=$(php bin/console doctrine:migrations:status | sed -n 's/.*Current Version:.*(//p' | cut -d ')' -f 1)
  fi
  mkdir -p "/var/www/sql_diff/$dir_name";
  php bin/console doctrine:migrations:migrate $version -q --write-sql "/var/www/sql_diff/$dir_name/$1.sql"
}

destroyCreateDB()
{
  php bin/console doctrine:database:drop --force --if-exists
  php bin/console doctrine:database:create
  return 0;
}

resetDB()
{
  echo "Begin resetDB";
  migrateDB;
  resetAdmin;
  echo "end resetDB";
  return 0
}


resetAdmin()
{
#todo resetadmin
  php bin/console reset:admin
  return 0
}

update()
{
  vendorUpdate;
  routes_js_generate;
  updateDB;
  clearcache;
  return 0
}

testAll()
{
  php bin/console cache:clear --env=test
  php bin/console doctrine:database:drop --force --env=test
  php bin/console doctrine:database:create --env=test
  php bin/console doctrine:migrations:migrate --env=test --no-interaction
  php bin/console hautelook:fixtures:load --no-interaction --env=test
  APP_ENV=test php vendor/behat/behat/bin/behat
  return 0
}

case "$1" in
        install)
            install
            ;;
        afterBuild)
            afterBuild
            ;;
        update)
            update
            ;;
        vendorInstall)
            vendorInstall
            ;;
        vendorUpdate)
            vendorUpdate
            ;;
        reloadFixtures)
            reloadFixtures
            ;;
        updateDB)
            updateDB
            ;;
        migrateDB)
            migrateDB "$2"
            ;;
        executeDB)
            executeDB "$2" "$3"
            ;;
        generateMigrationFile)
            generateMigrationFile
            ;;
        generateSQLMigration)
            generateSQLMigration "$2" "$3"
            ;;
        destroyCreateDB)
            destroyCreateDB
            ;;
        resetDB)
            resetDB
            ;;
        dbVersion)
            dbVersion
            ;;
        resetAdmin)
            resetAdmin
            ;;
        testAll)
            testAll
            ;;
        buildproject)
            buildproject
            ;;
        routesJSGenerate)
            routes_js_generate
            ;;
        *)
            printf $"Usage: $0
            install\t\t\tdestroy and install everything
            update\t\t\tupdate vendor + db
            afterBuild\t\t\trm the vendor and update and destroy db and create again
            vendorInstall\t\treinstall all vendors
            vendorUpdate\t\tupdate all vendors
            reloadFixtures\t\treload the fixtures in db
            updateDB\t\t\tupdate db
            migrateDB\t\t\migrateDB db
            executeDB\t\t\executeDB db
            generateMigrationFile\t\t\generateMigrationFile db
            resetDB\t\t\tresetDB and reload fixtures
            dbVersion\t\tshow latest migration version
            testAll\t\t\trun all test
            buildproject\t\talias for install + testAll
            routesJSGenerate\t\tgenerate json for routes in js backoffice
            resetAdmin\t\treset admin credential

{then the container}(optional)
"
            exit 1
esac
