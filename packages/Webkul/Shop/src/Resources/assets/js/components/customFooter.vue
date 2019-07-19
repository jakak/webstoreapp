<template>
    <p>
        &copy; {{getDate()}} {{credit}} | <a href="https://aboutsic.com/webmaster" target="_blank">Webmaster</a>
    </p>
</template>

<script>
export default {
    name: 'customFooter',
    props: ['credit'],
    methods: {
        getDate () {
            return new Date().getFullYear();
        }
    }
}
</script>