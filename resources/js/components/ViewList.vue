<template>
    <div class="container">
        <notifications position="top center" :max="3" :width="400"/>
        <div v-for="(item, index) in lists" :key="index">
            <lists-item :item="item" v-on:listUpdateReload="$emit('reloadUpdateNext')"/>
        </div>
    </div>
</template>
<script>
    import listsItem from './listsItem'
    export default {props: ['lists'], components: {
            listsItem
        }}
</script>