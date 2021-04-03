<template>
    <div class="container">
        <span>
            <template>
                <v-expansion-panels>
                    <v-col cols="12" sm="6" md="4">
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                <div :class="[item.completed ? 'completed' : '', 'textLists']">
                                    <input
                                        @change="updateList()"
                                        v-model="item.completed"
                                        type="checkbox"
                                        style="float:left;">
                                        {{item.list}}
                                    </div>
                                    <div>
                                        <v-btn @click="deleteList()" class="ma-2" color="primary" dark="dark">
                                            <font-awesome-icon class="ma-2" icon="trash"/>
                                        </v-btn>
                                        <v-btn
                                            href=""
                                            @click.prevent="editViews(item.id)"
                                            class="ma-2"
                                            color="primary"
                                            dark="dark">
                                            <font-awesome-icon icon="pencil-alt" color="primary"/>
                                        </v-btn>
                                    </div>
                                </v-expansion-panel-header>
                                <v-expansion-panel-content>
                                    <div :class="[item.completed ? 'completed' : '', 'textLists']">
                                        {{ item.description }}
                                    </div>
                                </v-expansion-panel-content>
                            </v-expansion-panel>
                        </v-col>
                    </v-expansion-panels>
                </template>
            </span>
            <template></template>
        </div>
    </template>
    <script>
        export default {
            props: ['item'],
            data: function () {
                return {editdatalist: []}
            },
            components: {},
            methods: {
                updateList() {
                    axios
                        .put('api/todolist/update/' + this.item.id, {item: this.item})
                        .then(response => {
                            if (response.status == 200) {
                                this.$emit('listUpdateReload')
                            }
                        })
                        .catch(error => {
                            console.log(error)
                        })
                    },
                deleteList() {
                    axios
                        .delete('api/todolist/delete/' + this.item.id)
                        .then(response => {
                            if (response.status == 200) {
                                this
                                    .$noty
                                    .error("data berhasil dihapus")
                                this.$emit('listUpdateReload')
                            }
                        })
                        .catch(error => {
                            console.log(error)
                        })
                    },
                editViews(id) {
                    this
                        .$router
                        .push({
                            name: 'editData',
                            params: {
                                id: id
                            }
                        })
                }
            }
        }
    </script>
    <style lang="scss" scoped="scoped">
        .completed {
            text-decoration: line-through;
            color: black;
        }
    </style>