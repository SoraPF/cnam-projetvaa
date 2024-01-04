composer install

chmod -R 775 vendor

composer --version

composer self-update

php artisan config:cache

cp .env.example .env
    -> verifier que .env contient:
        DB_CONNECTION=mysql     <-sinon pgsql pour psql
        DB_HOST=localhost
        DB_PORT=3306            <- le port vari en fonction de quoi utiliser ce port est de mysql et pour psql c'est 5432
        DB_DATABASE=laravel_projetvaa
        DB_USERNAME=laravel
        DB_PASSWORD=laravel

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve


npm install
npm run dev


ctrl+click droit sur le lien [http://127.0.0.1:8000]

connexion avec 
coach
    login: dedardel@email.me
    mdp: password
ou
rameur
    login: jissang@email.me
    mdp: password

Aver le coach allez creer un cours dans l'onglet create cours?
Continuer par vous connecter avec le rameur pour s'inscrit au cours.
Retourner avec le coach pour placer le rameur sur le vaa.
