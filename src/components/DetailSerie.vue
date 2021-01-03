<template>
    <div class="detail-film">
    <MenuBarre/>
        <div class="cadre-film">
            <h1>{{ detail.name }}</h1>
            <p>{{ trailer.results.id }}</p>
            <div class="detail">
                <i v-if="detail.adult == adult">Publics averti</i><i v-else>Tous publics</i><i class="vl"></i>
                <i>{{ detail.episode_run_time[0] }} minutes/episode</i><i class="vl"></i>
                <i>{{ genrefilm }}</i><i class="vl"></i>
                <i>{{ SaisonEpisode }}</i>
            </div>
            <img v-bind:src="'http://image.tmdb.org/t/p/w500/' + detail.poster_path">
            <iframe v-if="trailer.results.key == ''" v-bind:src="'https://www.youtube.com/embed/'+ trailer.results[0].key"></iframe>
            <iframe v-else v-bind:src="'https://www.youtube.com/embed/'+ trailer.results.key"></iframe>
        </div>
        <div class="information-comp">
            <h2>SYNOPSIS</h2>
            <p class="resumer-film">{{ detail.overview }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import MenuBarre from './MenuBarre'

export default {
    name: 'DetailFilm',
    components: {
        MenuBarre
    }, 
    data: () => {
        return {
            id: 0,
            detail: '',
            adult: 'adult',
            trailer: ''
        }
    },
  
    methods: {
        getDetailFilm() {
            axios.get('https://api.themoviedb.org/3/tv/'+this.id+'?api_key=1a260002e6b25560efb27f6c948b8e62&language=fr-FR')   
            .then(detail => (this.detail = detail.data))
            .catch(error => console.log(error))
        },
        getTrailer(){
            axios.get('https://api.themoviedb.org/3/movie/'+this.id+'/videos?api_key=1a260002e6b25560efb27f6c948b8e62&language=fr-FR')   
            .then(trailer => (this.trailer = trailer.data))
            .catch(error => console.log(error))
        }
    },
    created() {
        this.id = this.$route.params.id;
        this.getDetailFilm(); 
        this.getTrailer();
    },
    computed: {
        genrefilm: function () { 
            var i;
            var res = '';
            var b;
            if(this.detail.genres.length > 3){b = 3}
            else{b = this.detail.genres.length}
            for(i=0;i< b;i++){
                res = res + ' ' + this.detail.genres[i].name;
            }
            return res;
        },
        SaisonEpisode: function() {
            return this.detail.season_number;
        } 
    }
}
</script>

<style>
.cadre-film{
    font-family: 'comfortaa';
    position: absolute;
    background-color: white;color: black;border: solid orange;
    width: 70%;
    height: 37em;
    text-align: center;
    left: 13%;
}
.cadre-film img{position: absolute;width: 28%;bottom: 0px;left: 0;}
.cadre-film i{color: grey;}
.cadre-film .vl{border-left: 4px solid orange;margin-left: 15px;margin-right: 15px;margin-top: 10px;}
.cadre-film iframe{position: absolute;right: 0;bottom: 0;width: 70%;height: 71%;}
.resumer-film{width: 90%;}
.information-comp{font-family: 'comfortaa';left: 10%;position: absolute;top: 90%;}


</style>
