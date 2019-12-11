<template>
    <p>
        &copy; {{getDate()}} {{credit}} | <a class="hyperlink" href="https://haqqman.com/webmaster" target="_blank">Webmaster</a>
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
