<template>
    <div class="container">
        <div class="col-sm-6">
            <v-form v-model="item.valid">
                <v-container>
                    <v-row>
                        <v-col cols="12" sm="6" md="3">
                            <v-text-field
                                v-model="item.list"
                                :counter="5"
                                label="name list"
                                required="required"></v-text-field>
                            <p class="error" style="color:red;" v-if="errors.list">
                                {{ errors.list[0]}}
                            </p>
                        </v-col>
                        <v-col cols="12" sm="6" md="3">
                            <v-text-field
                                v-model="item.description"
                                :counter="5"
                                label="descriptions"
                                required="required"></v-text-field>
                            <p class="error" style="color:red;" v-if="errors.description">
                                {{ errors.description[0]}}
                            </p>
                        </v-col>
                        <div></div>
                        <v-col cols="12" sm="6" md="12">
                            <v-btn @click="addList()" class="ma-2" color="primary" dark="dark">
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
        data: () => {
            return {
                item: {
                    list: '',
                    description: ''
                },
                errors: {}
            }
        },
        components: {},
        methods: {
            addList() {
                if (this.item.list == '') {
                    return;
                }
                axios
                    .post('api/todolist/add', {
                        list: this.item.list,
                        user_id: '1',
                        description: this.item.description
                    })
                    .then(Response => {
                        if (Response.status == 201) {
                            this.item.list = "";
                            this.item.description = "";
                            this.$emit('reloadlist');
                            this.$notify(
                                {group: "custom-style", type: 'success', duration: 2000, title: 'Success Added', text: 'berhasil ditambahkan 1 buah data success!'}
                            );
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 403) {
                            this.errors = error.response.data.pesan;
                        }
                    })
                }
        }
    }
</script>