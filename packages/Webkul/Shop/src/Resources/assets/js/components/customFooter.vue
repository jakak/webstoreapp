<template>
    <p>
        &copy; {{getDate()}} Kling Bake Shop | <a href="https://aboutsic.com/webmaster" target="_blank">Webmaster</a>
    </p>
</template>

<script>
export default {
    name: 'customFooter',
    methods: {
        getDate () {
            return new Date().getFullYear();
        }
    }
}
</script>