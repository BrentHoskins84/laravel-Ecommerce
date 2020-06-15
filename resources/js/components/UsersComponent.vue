<template>
    <div class="container-fluid">
        <div class="row ml-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <!--                        <th scope="col">Roles</th>-->
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody v-for="user in users" v-bind:key="user.id">
                            <tr>
                                <th scope="row">{{user.id}}</th>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <!--                        <td>{{user.role}}</td>-->
                                <td>
                                    <a href="#"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                    <form action="#" method="POST" class="float-left">
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                user: {
                    id: '',
                },
                user_id: '',
                pagination: {},
                edit: false,
            }
        },

        mounted () {
            this.fetchUsers();
        },

        methods: {
            fetchUsers(){
                fetch('/api/users')
                .then(res => res.json())
                .then(res => {
                    this.users = res.data;
                })
            }
        }

    }
</script>
