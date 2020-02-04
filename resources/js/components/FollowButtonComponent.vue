<template>
    <div>
        <button class="btn btn-primary" @click="follow">follow</button>
    </div>
</template>

<script>
    export default {
        props: ['url'],
        methods: {
            follow() {
                axios.post(this.url)
                    .then(data => console.log(data.success))
                    .catch(e => console.error({e}))
            }
        }
    }
</script>
