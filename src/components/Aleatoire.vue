<template>
    <div class="aleatoire">  
      <MenuBarre/>
            
           <!-- <div  v-for="item in film_aleatoire" :key="item.id" class="film" v-bind:id="item.id">
                <div v-if="item.success == 'true'">
                    <a v-bind:href="'/detail-film/'+ item.id"><img v-bind:src="'http://image.tmdb.org/t/p/w500/' + item.poster_path" width='450px'>
                    <p>{{item.title}}</p></a>
                </div>
                <div v-else Aleatoire(this.min,this.max);>
                </div>
            </div>
            <button v-on:click="getNextImage()">RUN</button>
            <div class="boutonaleatoire">
                <button v-on:click="Aleatoire()">RUN</button>
            </div>-->

            <h1 style="text-align:center">PAGE EN DEVELOPPEMENT</h1>
            
            
    </div>
</template>

<script>
import MenuBarre from './MenuBarre'
import axios from 'axios'

export default {
  name: 'Aleatoire',
  components: {
      MenuBarre
  }, 
  data: () => {
    return {
        nb_aleatoire: '',
        film_aleatoire: ''
    }
  },
 created() {
    this.Aleatoire(1,10000);
    
  },
 methods: {
    Aleatoire(min, max){
        this.nb_aleatoire = Math.floor(Math.random() * (max - min + 1)) + min;
        console.log(this.nb_aleatoire);

        //axios.get('https://api.themoviedb.org/3/movie/'+this.nb_aleatoire+'?api_key=1a260002e6b25560efb27f6c948b8e62&language=en-US')   
        axios.get('https://api.themoviedb.org/3/movie/3?api_key=1a260002e6b25560efb27f6c948b8e62&language=en-US')   
        .then(film_aleatoire => (this.film_aleatoire = film_aleatoire.data.results))
        .catch(error => console.log(error))
        console.log(this.film_aleatoire);
    }
    
 }
}
</script>

<style>
    .boutonaleatoire button {
        margin-left:750px;
        width: 170px;
        border-radius: 10px;
        line-height: 30px;
        text-align: center;
        background-color: black;
        color: orange;
    }

    .boutonaleatoire button:hover {
    background-color: orange;
    color: white;
  }
</style>