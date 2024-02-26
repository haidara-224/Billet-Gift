<template>
    <div>
        <h2>Lieux Page</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Adresse</th>
                <th>Capacite</th>
                <th>Image</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="salles in Salle" :key="salles.id">
                <td>{{ salles.id }}</td>
                <td>{{ salles.name }}</td>
                <td>{{ salles.adresse }}</td>
                <td>{{ salles.capacity }}</td>
                <td v-if="salles.image!==null">
                    {{ salles.image }}
                </td>
                <td v-else>
                    pas de photo

                </td>
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
        Salle:[]
    }
},
mounted() {
    axios.get('/api/gift/salle')
    .then(response=>{
        this.Salle=response.data.salle
    })
    .catch((error)=>{
        console.log(error)
    })
},
}
</script>

