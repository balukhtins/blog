<template>
    <div>
        <AdminHeader
            :routes="routes"
        ></AdminHeader>

        <b-container fluid>
            <b-row>
                <b-col class="my-1">

                    <b-form @submit.prevent="submitFormHandler">

                        <b-form-group id="input-group-2" label="Post title:" label-for="input-2">
                            <b-form-input
                                    id="input-2"
                                    v-model="form.title"
                                    required
                                    placeholder="Enter title"
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group id="input-group-1" label="Post short description:" label-for="input-1">
                            <b-form-textarea
                                    id="input-2"
                                    v-model="form.short_description"
                                    required
                                    placeholder="Enter short description"
                            ></b-form-textarea>
                        </b-form-group>

                        <b-form-group id="input-group-3" label="Post body:" label-for="input-3">
                            <b-form-textarea
                                    id="input-2"
                                    v-model="form.body"
                                    required
                                    placeholder="Enter body"
                            ></b-form-textarea>
                        </b-form-group>

                        <b-form-group id="input-group-4" label="Status:" label-for="input-4">
                            <b-form-select
                                    id="input-3"
                                    v-model="form.published_status"
                                    :options="props_published_status"
                                    required
                            ></b-form-select>
                        </b-form-group>


                        <b-button type="submit" variant="primary">Edit post</b-button>
                    </b-form>

                </b-col>
            </b-row>
        </b-container>

    </div>
</template>

<script>

    import AdminHeader from '../Header/Index';

    export default {
        name: "AdminPostsEdit",
        components: {
            AdminHeader
        },props:{
            routes:{},
            props_published_status:{},
            post:{}
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
        created(){
            this.form = {...this.post};
        },
        methods:{
            submitFormHandler(){
                axios.put(
                    `${this.routes.adminPosts}/${this.post.slug}`,
                    this.form
                ).then(res => {
                    location.href = this.routes.adminPosts;
                }).catch(err => {

                })
            }
        }
    }
</script>

<style scoped>

</style>