#!/bin/bash

read -r -p "Sync to Production [p] or Sync to Development [d]" response

if [[ "$response" =~ ^([pP])$ ]]; then
    ssh web@auction.uksouth.cloudapp.azure.com 'cat - | mysql -u root -pdevpw > prod-backup.sql'
    ssh vagrant@example.test 'cd /srv/www/auction.uksouth.cloudapp.azure.com/current; mysqldump -u root -pdevpw --all-databases' | ssh web@auction.uksouth.cloudapp.azure.com 'cat - | mysql -uroot -pproductionpw'
    echo Synced local development database to production
    else
    ssh vagrant@example.test 'cat - | mysql -u root -pdevpw > dev-backup.sql'
    ssh web@auction.uksouth.cloudapp.azure.com 'cd /srv/www/auction.uksouth.cloudapp.azure.com/current; mysqldump -uroot -pproductionpw --all-databases' | ssh vagrant@example.test 'cat - | mysql -u root -pdevpw'
    echo Synced production database to local development
fi