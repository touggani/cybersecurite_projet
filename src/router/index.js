import DetailFilm from '../components/DetailFilm.vue';
import NotFound from '../components/404.vue';
import ListeFilm from '../components/ListeFilm.vue';
import Accueil from '../components/Accueil.vue';
import ListeSerie from '../components/ListeSerie.vue';
import DetailSerie from '../components/DetailSerie.vue';
import Recherche from '../components/Recherche.vue';
import Aleatoire from '../components/Aleatoire.vue';
import Connexion from '../components/Connexion.vue';
//import Utilisateur from '../components/Utilisateur.vue';
//import CreateUser from '../components/CreateUser.vue';
//import Users from '../components/Users.vue';

/*
 Paths are resolved in the order of the list.
 Hence, the 404 path must be at the end.
*/
export const routes = [
    { path: '/', component: Accueil, name: 'Accueil' },
    { path: '/detail-film/:id',  component: DetailFilm, name: 'DetailFilm' },
    { path: '/liste-film', component: ListeFilm, name: 'ListeFilm' },
    { path: '/liste-serie', component: ListeSerie, name: 'ListeSerie' },
    { path: '/detail-serie/:id', component: DetailSerie, name: 'DetailSerie' },
    { path: '/recherche', component: Recherche, name: 'Recherche' },
    { path: '*', component: NotFound, name: '404' },
    { path: '/aleatoire', component: Aleatoire, name: 'Aleatoire'},
    { path: '/boutique', component: Aleatoire, name: 'Boutique'},
    { path: '/connexion', component: Connexion, name: 'Connexion'}
    //{ path: '/utilisateur', component: Utilisateur, name: 'Utilisateur'}
    //{ path: '/create-user', component: CreateUser, name: 'CreateUser'},
    //{ path: '/users', component: CreateUser, name: 'Users'}
];