<template>
    <div>
        <AdminHeader
            :routes="routes"
        ></AdminHeader>

        <b-container fluid>
            <b-row>
                <b-col class="my-1">

                    <b-form @submit.prevent="submitFormHandler">

                        <b-form-group id="input-group-1" label="Post title:" label-for="title">
                            <b-form-input
                                    id="title"
                                    v-model="form.title"
                                    required
                                    placeholder="Enter title"
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group id="input-group-2" label="Post short description:" label-for="description">
                            <b-form-textarea
                                    id="description"
                                    v-model="form.short_description"
                                    required
                                    placeholder="Enter short description"
                            ></b-form-textarea>
                        </b-form-group>

                        <b-form-group id="input-group-3" label="Post body:" label-for="body">
                            <b-form-textarea
                                    id="body"
                                    v-model="form.body"
                                    required
                                    placeholder="Enter body"
                            ></b-form-textarea>
                        </b-form-group>

                        <b-form-group id="input-group-4" label="Status:" label-for="published_status">
                            <b-form-select
                                    id="published_status"
                                    v-model="form.published_status"
                                    :options="props_published_status"
                                    required
                            ></b-form-select>
                        </b-form-group>

                        <!--<tinymce-editor api-key="rrwtslc5f4mzvlcxfcmwqkkplxua1w58jw9gpdx3399jbrqc" :init="{plugins: 'wordcount'}"></tinymce-editor>-->

                        <b-button type="submit" variant="primary">Create post</b-button>
                    </b-form>

                </b-col>
            </b-row>
        </b-container>

    </div>
</template>

<script>

    // var Editor = require('@tinymce/tinymce-vue').default;
    // import Editor from '@tinymce/tinymce-vue';

    import AdminHeader from '../Header/Index';

    export default {
        name: "AdminPostsCreate",
        components: {
            AdminHeader,
            // 'tinymce-editor': Editor
        },props:{
            routes:{},
            props_published_status:{}
        },
        data(){
            return {
                form:{
                    title:'',
                    short_description:'',
                    body:'',
                }
            }
        },
        methods:{
            submitFormHandler(){
                axios.post(
                    this.routes.adminPosts,
                    this.form
                ).then(res => {
                    location.href = this.routes.adminPosts;
                }).catch(err => {

                })
            }
        },
        created(){

        }
    }
</script>

<style scoped>

</style>