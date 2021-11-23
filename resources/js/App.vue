<template>
    <div>
        <Header/>
        <Main/>
        <Footer/>
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Main from './components/Main.vue'
import Footer from './components/Footer.vue'

    export default{
        name: "App",
        components: {
            Header,
            Main,
            Footer,
        },
        data () {
            return {
                posts: null
            }
        },
        mounted () {
            axios
            .get('http://localhost:8000/api/posts')
            .then(response => (this.posts = response))
        }
    }
</script>