<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use App\Entity\Author;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create($fakerLocale = 'fr_FR');

        // ARTICLES
        for ($i = 0; $i < 5; $i++) {

            // CATÉGORIES
            // Je liste les catégories que je veux créer
            $categories = [
                'Loisirs',
                'Spas',
                'Cinémas',
                'Restaurants',
                'Hotels'
            ];

            // Je crée un nouvel objet catégorie
            $categorie = new Category();
            // J'utilise la méthode setName pour définir le nom de la catégorie
            $categorie->setName($categories[$i]);
            // J'enregistre la catégorie en base de données avec Doctrine
            $manager->persist($categorie);

            // AUTEURS
            // Je crée un nouvel objet auteur
            $auteur = new Author();
            // J'utilise la méthode setName pour définir le nom de l'auteur
            $auteur->setName($faker->name());
            // J'enregistre l'auteur en base de données avec Doctrine
            $manager->persist($auteur);

            // Je crée un nouvel objet article
            $article = new Article();
            // J'utilise la méthode setTitle pour définir le titre de l'article
            $article->setTitle($faker->sentence(1));
            // J'utilise la méthode setContent pour définir le contenu de l'article
            $article->setContent($faker->paragraph(4));
            // J'utilise la méthode setCategory pour définir la catégorie de l'article
            $article->setCategory($categorie);
            // J'utilise la méthode setAuthor pour définir l'auteur de l'article
            $article->setAuthor($auteur);
            // J'enregistre l'article en base de données avec Doctrine
            $manager->persist($article);
        }

        $manager->flush();
    }
}
