<template>
    <div>
        <nav class="navbar navbar-dark  bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Billet Gift</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control  w-100" v-model="recherche.name" @input="seach" type="text" placeholder="Rechercher" aria-label="Rechercher">

  </nav>
        <h2>Gestions Des Organisateurs</h2>
        <button  type="submit" class="btn btn-primary" @click="newOrg">New</button>
        <p>Total: {{ total }}</p>
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
              <tr v-for="Organisateurs in Organisateur.data" :key="Organisateurs.id">
                <td>#{{Organisateurs.id}}</td>
                <td>{{Organisateurs.name }}</td>
                <td>{{ Organisateurs.description }}</td>
                <td>{{ Organisateurs.adresse }}</td>
                <td>{{ Organisateurs.email }}</td>
                <td>{{ Organisateurs.tel }}</td>
                <td v-if="Organisateurs.image!==null">
                    <img :src="Images(Organisateurs.image)" class="img-fluid" style="width: 100px;" alt="...">
                </td>
                <td v-else>Pas D'image</td>
                <td>
                    <button><i class="fa fa-edit" style="color: green; margin: 10px;" aria-hidden="true"></i></button>
                    <button><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></button>
                </td>


              </tr>


            </tbody>
            <TailwindPagination
        :data="Organisateur"
        @pagination-change-page="getResults"
    />
          </table>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { TailwindPagination } from 'laravel-vue-pagination';
import {useRouter} from 'vue-router'

export default {
    data() {
        return {
            Organisateur:[],
            recherche:{
                name:''
            },
            router:useRouter(),
            total:0
        }
    },
    mounted() {
        this.getInitResult()

    },
    methods: {
        seach()
        {
            this.getResults(1)

        },
        Images(img)
        {
            return img ? `/storage/${img}` : "/storage/vide.jpg"

        },
        newOrg()
        {
            this.router.push('/dashboard/organisateur/new')

        },
       async getInitResult()
        {
           await axios.get('/api/gift/organisateur')
           .then(response=>{
            this.Organisateur=response.data.organisateur
            this.total=response.data.organisateur.total

           })
           .catch(error=>{
            console.log(error)
           })

        },
       async getResults(page =1)
        {
            await axios.get('/api/gift/organisateur?page='+page,{
                params:{
                    page:page,
                    name:this.recherche.name
                }
            })
            .then(response=>{
                this.Organisateur=response.data.organisateur


            })
            .catch(error=>console.log(error))

        }

},

components:{
    TailwindPagination,

}


}
</script>

