Project clone
``` bash
git clone https://github.com/danijar2000/lunch.git
cd lunch
composer install
```
Configuration 
``` bash
cp .env.example .env
php artisan key:generate
sudo chmod -R 777 storage/
sudo chmod -R 777 bootstrap/cache/
nano .env
```
Migration and seed
``` bash
php artisan migrate --seed
```
install static files
``` bash
npm install && npm run prod
```
