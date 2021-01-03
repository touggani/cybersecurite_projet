<template>
    <div id='liste-film'>
        <MenuBarre/>
        <h1>DERNIÈRE SORTIE</h1>
        <div class="derniere-sortie">
            <div  v-for="item in derniereSorties" :key="item.id" class="film" v-bind:id="item.id" >
                <a v-bind:href="'/detail-film/'+ item.id"><img v-bind:src="'http://image.tmdb.org/t/p/w500/' + item.poster_path" width='100px'>
                <p>{{item.title}}</p></a>
            </div>
        </div> 
        <h1>FILM POPULAIRE</h1>
        <div class="derniere-sortie">
            <div  v-for="item in populaire" :key="item.id" class="film" v-bind:id="item.id">
                <a v-bind:href="'/detail-film/'+ item.id"><img v-bind:src="'http://image.tmdb.org/t/p/w500/' + item.poster_path" width='100px'>
                <p>{{item.title}}</p></a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import MenuBarre from './MenuBarre'

export default {
    name: 'ListeFilm',
    components: {
        MenuBarre
    },
    data () {
        return {
            derniereSorties: '',
            populaire: ''
        }
    },
    created() {
        this.getupcoming();
        this.getPopular();
    },
    methods: {
        getupcoming() {
            axios.get('https://api.themoviedb.org/3/movie/upcoming?api_key=1a260002e6b25560efb27f6c948b8e62&language=en-US&page=1')   
            .then(derniereSorties => (this.derniereSorties = derniereSorties.data.results))
            .catch(error => console.log(error))
        },
        getPopular() {
            axios.get('https://api.themoviedb.org/3/movie/popular?api_key=1a260002e6b25560efb27f6c948b8e62&language=en-US&page=1')   
            .then(populaire => (this.populaire = populaire.data.results))
            .catch(error => console.log(error))
        }
    }
}
</script>

<style>
#liste-film h1{text-align: center;}
a{text-decoration: none;color: black;}
.derniere-sortie {margin-top: 4%;column-count: 4;width: 65%;margin-left: 17%;}
.film{padding-top: 0%;padding-bottom: 25%;font-family: 'comfortaa';text-align: center;}
</style>