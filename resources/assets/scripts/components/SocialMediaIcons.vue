<template>
        <div class="d-flex justify-content-center social-icons">
            <a 
                v-for="(icon) in iconData"
                :key="icon.index" 
                v-html="icon['1']" 
                :href="icon['0']"
                :style="'width:' + size + 'px; margin:' + margin + 'rem;'"
                target="_blank"
            ></a>
        </div>
</template>

<script>
    export default {
        props: {
            iconData: {
                type: Object,
                default: {} = []
            },
            size: {
                type: Number,
                default: 30
            },
            margin: {
                type: Number,
                default: 0
            }
        }
    }
</script>