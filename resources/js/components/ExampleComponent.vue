<template>
    <button onclick="axios.post('/event');">Trigger event</button>
</template>

<script>
    export default {
        props: {
            id: Number
        },
        mounted() {
            console.log(this.id);
            window.Echo.private(`test.${this.id}`)
            .listen('.test.event', (e) => this.onButtonClick(e));
        },
        methods: {
            onButtonClick: function (event) {
                alert("Event test");
                console.log(event);
            }
        }
    }
</script>
