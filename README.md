Da biste preuzeli ovaj projekat pokrenite sledecu komandu

git clone https://github.com/vukadinlazarevic/laravel2.git

Zatim, odradite instalaciju svih neophodnih paketa

composer install

Takodje, ne bi bilo lose da se instaliraju node paketi

npm install

Zatim, treba da napravimo .env fajl na osnovu .env.example fajla

cp .env.example .env

Pokrenite kreiranje baze

php artisan migrate

Na kraju svega, instalirati kljuc za applikaciju

php artisan key:generate

---------------------------------------------------

Da biste pokrenuli migraciju uradite 

`php artisan migrate`

Da biste pokrenuli seed baze 

`php artisan db:seed`

Da biste pokrenuli celu aplikaciju

`composer run dev` ili `php artisan serve`