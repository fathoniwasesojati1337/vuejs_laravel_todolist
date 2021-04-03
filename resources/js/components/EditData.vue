<template>
    <div class="container">
        <h1>Edit Data</h1>
        <div class="col-sm-6">
            <v-form @submit.prevent="update()">
                <v-container>
                    <v-row>
                        <v-col cols="12" sm="6" md="3">
                            <v-text-field
                                v-model="edit.list"
                                :counter="5"
                                label="name list"
                                required="required"></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="3">
                            <v-text-field
                                v-model="edit.description"
                                :counter="5"
                                label="descriptions"
                                required="required"></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="12">
                            <v-btn type="submit" class="ma-2" color="primary" dark="dark">
                                Submit
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-form>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['id'],
        data() {
            return {
                edit: {
                    list: '',
                    description: ''
                }
            }
        },
        methods: {
            parseData() {
                axios
                    .get('/api/todolist/' + this.id)
                    .then(response => {
                        this.edit = {
                            list: response
                                .data[0]
                                .list,
                            description: response
                                .data[0]
                                .description
                        }
                    })
            },
            update() {
                axios
                    .put('/api/todolist/updateList/' + this.id, {
                        list: this.edit.list,
                        description: this.edit.description
                    })
                    .then(response => {
                        if (response.status == 200) {
                            this.$noty.success("berhasil di Edit 1 buah data!")
                            this
                                .$router
                                .push({name: 'utama'})
                        }
                    })
                    .catch(err => {
                        console.log(err)
                    })
                }
        },
        mounted() {
            this.parseData()
        }
    }
</script>