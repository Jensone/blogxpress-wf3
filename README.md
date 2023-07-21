Créer un projet Symfony :

`symfony new blogxpress --webapp`

---

Entrer dans le dossier du projet et lancer le serveur :

`cd blogxpress && symfony server:start -d`

---

Créer un un fichier `.env.local` pour y mettre les information de la BDD et du Mailer :

```
DATABASE_URL="mysql://root:root@127.0.0.1:3306/blogxpress?serverVersion=10.11.2-MariaDB&charset=utf8mb4"

MAILER_DSN=smtp://2497249724:98451313131@sandbox.smtp.mailtrap.io:2525?encryption=tls&auth_mode=login
```
---

Créer la BDD avec la commande : 

`symfony console d:d:c` qui signifie `doctrine:database:create`

---

Créer des entités (qui représente les tables) :

`symfony console make:entity`

Rempli le formulaire.

---

On créer un fichier de version pour la migration :

`symfony console make:migration`

---

On execute la migration :

`symfony console d:m:m` qui signifie `doctrine:migrations:migrate`

---

Pour mettre des données fictives en place j'utilise `AppFixtures` avec ou `FakerPHP`

---

On créer un/des controller :

`symfony console make:controller`

On remplis le formulaire


Le controller contient :

Les routes, et au niveau des routes on va pouvoir transférer les données en tout genres (de la BDD, Formulaires, API...)

---

Protéger une route ce fait dans le fichier `security.yaml` 
/!\ attention pas d'utilisation de pretiier dans les fichier .yaml (pas de ctrl+s ou cmd+s)

```
access_control:
        - { path: ^/admin, roles: ROLE_USER }
        # - { path: ^/profile, roles: ROLE_USER }
```

dans l'exemple les route qui commencent par `/admin` seront accessible par les utilisateur de l'application avec un `ROLE_USER`. L'autre commentée n'est pas active.

Dans ce cas on passe à la création d'un utilisateur :

`symfony console make:user`

on passe à la création d'un formulaire d'inscription si besoin :

`symfony console make:registration-form`

On séléction un formaulaire et on suis les instructions.

Suite à cela on met un formulaire authenfication :

`symfony console make:auth`

On rempli le formulaire et suis les instructions.

---

L'endoir où je travaille avec le V de MVC c'est : 

`/templates`

`base.html.twig` représente la structure global de l'app ou du site.

Les différent dossier contiendront les templates dédiés aux associées.


