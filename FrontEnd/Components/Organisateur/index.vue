<template>
    <div>
        <h2>Gestions Des Organisateurs</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Structures</th>
                <th>Descriptions</th>
                <th>Adresses</th>
                <th>Emails</th>
                <th>Tels</th>
                <th>Images</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="Organisateurs in Organisateur" :key="Organisateurs.id">
                <td>#{{Organisateurs.id}}</td>
                <td>{{Organisateurs.name }}</td>
                <td>{{ Organisateurs.description }}</td>
                <td>{{ Organisateurs.adresse }}</td>
                <td>{{ Organisateurs.email }}</td>
                <td>{{ Organisateurs.tel }}</td>
                <td v-if="Organisateurs.image!==null">{{ Organisateurs.image }}</td>
                <td v-else>Pas D'image</td>

              </tr>

            </tbody>
          </table>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            Organisateur:[]
        }
    },
    mounted() {
        axios.get('/api/gift/organisateur')
        .then(response=>{
            this.Organisateur=response.data.organisateur
            console.log(response.data.user)
        })
        .catch(error=>{
            console.log(error)
        })
    },
}
</script>

