<template>

    <div class="w-100">

        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user,i) in data_users.data" :key="i">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.contact.phone }}</td>
                    <td>{{ user.role }}</td>
                    <td>

                        <button class="btn btn-danger" @click="deleteHandler(user.id)">Delete</button>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12">
            <div class="overflow-auto">
                <b-pagination-nav :link-gen="linkGen" :number-of-pages="users.last_page" use-router></b-pagination-nav>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "Index",
        props:{
            users:{
                type: Object,
                required: true
            },
            request:{
                type:[Object,Array],
                required: true
            }
        },
        data(){
            return {
                data_users: {}
            }
        },
        created(){
            this.data_users = this.users
        },
        methods: {
            linkGen(pageNum) {
                return pageNum === 1 ?
                    {
                        path: this.getFirstPageUrl(),
                        query: {...this.request}
                    }
                    :
                    {
                        path: location.pathname,
                        query: { page: pageNum, ...this.request}
                    }
            },
            getFirstPageUrl(){
                return location.pathname.length > 3 && location.pathname[location.pathname.length-1] === '/'?
                    location.pathname.slice(0,-1)
                    :
                    location.pathname
            },
            deleteHandler(id){
                console.log(id);

                axios.delete(`${location.pathname}/${id}${location.search}`)
                    .then(res => {
                        // console.log(res.data.users);
                        this.data_users = JSON.parse(res.data.users);
                    })
            }
        }
    }
</script>

<style scoped>

</style>