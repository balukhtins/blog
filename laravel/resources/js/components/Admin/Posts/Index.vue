<template>

    <div>

        <AdminHeader
                :routes="routes"
        ></AdminHeader>

        <b-container fluid>
            <b-row>
                <b-col class="my-1">

                    <b-link :href="routes.adminPostsCreate" class="btn btn-success">Create new post</b-link>

                </b-col>
            </b-row>
            <b-row>
                <b-col class="my-1">

                    <b-table small :fields="fields" :items="items">
                        <!-- A virtual column -->
                        <template slot="index" slot-scope="data">
                            {{ data.index + 1 }}
                        </template>

                        <template slot="user" slot-scope="data">
                            {{ data.value.name }}
                        </template>

                        <template slot="slug" slot-scope="data">
                            <b-link :href="`${routes.adminPosts}/${data.value}/edit`" class="btn btn-warning mr-2">Edit</b-link>
                            <b-button size="sm" class="mr-2" variant="danger" @click="deletePostHandler(data.value)">
                                Delete
                            </b-button>
                        </template>


                    </b-table>

                </b-col>
            </b-row>
        </b-container>

    </div>

</template>

<script>

    import AdminHeader from '../Header/Index';

    export default {
        name: "AdminPosts",
        components: {
            AdminHeader
        },
        props:{
            posts:{},
            routes:{}
        },
        data() {
            return {
                fields: [
                    // A virtual column that doesn't exist in items
                    'index',
                    'title',
                    // A column that needs custom formatting
                    { key: 'user', label: 'Author' },
                    { key: 'slug', label: 'Actions' },

                ],
                items: []
            }
        },
        created(){
            this.items = this.posts.data
        },
        methods:{
            deletePostHandler(slug){
                // console.log('deletePostHandler', this.adminPosts)
                axios.delete(`${this.routes.adminPosts}/${slug}`)
                    .then(res => {
                        // console.log(JSON.parse(res.data.data))
                        this.items = JSON.parse(res.data.data).data
                    })
            }
        }
    }
</script>

<style scoped>

</style>