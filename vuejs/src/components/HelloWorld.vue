<template>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody v-if="users.length">
      <tr v-for="user in users" :key="user.id">
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import axios from 'axios'
export default {
  name: 'HelloWorld',
  data(){
    return {
      users:[]
    }
  },
  props: {
    msg: String
  },

  created(){
    this.fetchUsers()
  },

  methods:{
    async fetchUsers(){
      let users = await axios.get('https://usermodules.test/api/users')
      this.users = users.data
    }
  }
}
</script>


