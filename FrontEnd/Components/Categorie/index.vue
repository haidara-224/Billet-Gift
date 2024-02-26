<template>
    <div>
        <h2>Categories Page</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Categories Evenements</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="categories in categorie" :key="categories.id">
                <td>{{ categories.id }}</td>
                <td>{{ categories.name }}</td>
                <td>
                    <a href="">Editer</a>


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
        categorie:[]
    }
},
mounted() {
    axios.get('/api/gift/categorie')
    .then(response=>{
        this.categorie=response.data.categorie
        console.log(response.data.user)

    })
    .catch(error=>console.log(error))
},
}
</script>

