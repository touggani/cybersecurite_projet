# Dockerizing a Vue.js application

## Bibliothèque cinématographique

* I-	Explication de l’application
L’application web est une application réalisée en vuejs. Elle affiche les dernières sorties de film et les séries les plus populaires du moment. Plusieurs vues sont utilisées dont : 
 * -	Accueil.vue : la page d’accueil du site 
 * -	Aleatoire.vue : Génère un film aléatoirement afin de découvrir ou trouver quoi regarder (page en maintenance – problème au niveau de l’api)
 * -	Boutique.vue : (page en maintenance)
 * -	Connexion.vue : une page de connexion utilisateur
 * -	DetailFilm.vue : permet d’avoir des informations sur le film sélectionné tels que sa durée, sa date de sortie ou encore sa bande annonce
 * -	DetailSerie.vue : permet d’avoir des informations sur la série sélectionnée tels que sa durée, sa date de sortie ou encore sa bande annonce
 * -	ListeFilm.vue : affiche les films les plus récents
 * -	ListeSerie.vue : affiche les séries les plus populaires
 * -	MenuBarre.vue : La barre de menu se trouvant sur tous les pages
 * -	Recherche.vue : permet de chercher n’importe quel film à l’aide d’une barre de recherche

 * -	Configuation
 * -	Router/index.js : indique les chemins entre les pages et les vues.

L’application utilise une API (The Movie DB – TMDB). 

Par manque de temps, la page de connexion n’a pas pu être fonctionnel. Le vuejs n’utilisant pas de sql, il faut passer par la création d’une api (ex : symphony) et l’appeler avec l’application. Elle sera réalisée prochainement.

* II-	Sécurité 
