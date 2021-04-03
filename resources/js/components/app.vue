<template>
    <div class="container">
        <tambah-form-list v-on:reloadlist="getList()"></tambah-form-list>
        <!-- Custom style example -->
        <notifications
            group="custom-style"
            position="top center"
            :max="3"
            :width="400"/>
        <lihat-list v-on:reloadUpdateNext="getList()" :lists="lists"></lihat-list>
    </div>
</template>
<script>
    import tambahFormList from './addItemList'
    import EditData from './EditData'
    import lihatList from './ViewList'
    export default {
        components: {
            tambahFormList,
            lihatList,
            EditData
        },
        mounted() {
            console.log('berhasil mount')
        },
        data: function () {
            return {lists: []}
        },
        methods: {
            getList() {
                axios
                    .get('api/todolist')
                    .then(response => {
                        this.lists = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                }
        },
        created() {
            this.getList()
        }
    }
</script>