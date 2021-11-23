<template>
    <main>
        Sono il Main, elenco posts:
        <ul>
            <li v-for="post in posts" :key="post['id']">{{post['title']}}</li>
        </ul>
    </main>
</template>

<script>
import axios from 'axios';
    export default{
        name: "Main",
        data() {
            return{
                posts: []
            }
        },
        mounted(){
            axios.get('/api/posts')
            .then((response) => {
                this.posts = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
</script>