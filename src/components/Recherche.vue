<template>
    <div class="recherche">
        <h1>Recherche</h1>
        <MenuBarre/>
        <input class="barre-recherche" type='text' placeholder="Harry Potter" v-model='query' @keyup='getResult()'>
        <div v-for='result in results' :key='result.id'>
            <a v-bind:href="'/detail-film/'+ result.id"><p>{{result.title}}</p>
            <img v-bind:src="'http://image.tmdb.org/t/p/w500/'+result.poster_path" width='100px'></a>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import MenuBarre from './MenuBarre'

export default {
    name: 'search',
    components: {
        MenuBarre
    },
    data () {
        return {
            query: '',
            results: ''
        }
    },
    methods:{
        getResult() {
            axios.get('https://api.themoviedb.org/3/search/movie?api_key=1a260002e6b25560efb27f6c948b8e62&query=' + this.query)
            .then(response => { this.results = response.data.results })
            console.log(this.results)
        }
    }
}
</script>

<style>
.recherche{
    position: absolute;left:45%;
}
.barre-recherche{
    position: absolute;
    font-size: 20px;
    width: 350px;
    height: 20px;
    left: -100px;
}
</style>