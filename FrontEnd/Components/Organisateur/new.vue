<template>
    <div>
        <h1 class="text-primary">Ajouter Un Organisateur</h1>
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            <div class="col-md-4">
                <label for="name" class="form-label">Nom De L'organisateur</label>
                <input :class="{'is-invalid' : errorMessage.name}" type="text" v-model="form.name" class="form-control" id="name" name="name" value="" required>
                <div class="invalid-feedback" v-if="errorMessage.name" v-for="errorMessages in errorMessage.name" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>
            <div class="col-md-4">
                <label for="description" class="form-label">Description</label>
                <input  :class="{'is-invalid' : errorMessage.description}" type="text" class="form-control" v-model="form.description" id="description"  name="description"
                    value="" required>
                    <div class="invalid-feedback" v-if="errorMessage.description" v-for="errorMessages in errorMessage.description" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>
            <div class="col-md-4">
                <label for="adresse" class="form-label">Adresse</label>
                <input :class="{'is-invalid' : errorMessage.adresse}" v-model="form.adresse" type="text" class="form-control" id="adresse" name="adresse" value=""
                    required>
                    <div class="invalid-feedback" v-if="errorMessage.adresse" v-for="errorMessages in errorMessage.adresse" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>
            <div class="col-md-4">
                <label for="tel" class="form-label">Telephone</label>
                <input :class="{'is-invalid' : errorMessage.tel}" type="tel" v-model="form.tel" class="form-control" id="tel" value="" name="tel" required>
                <div class="invalid-feedback" v-if="errorMessage.tel" v-for="errorMessages in errorMessage.tel" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input :class="{'is-invalid' : errorMessage.email}"  type="text" v-model="form.email" class="form-control" id="email" name="email" value="" required>
                <div class="invalid-feedback" v-if="errorMessage.email" v-for="errorMessages in errorMessage.email" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>
            <div class="col-md-4">
                <label for="image" class="form-label">Image</label>
                <input  :class="{'is-invalid' : errorMessage.image}"  type="file" @change="getImage" class="form-control" id="image" name="image" required>
                <div class="invalid-feedback" v-if="errorMessage.image" v-for="errorMessages in errorMessage.image" :key="errorMessages" >
                    {{ errorMessages }}

                </div>
            </div>

            <div class="col-12">
                <button @click.prevent="Enregister" class="btn btn-primary" type="submit">Enregister</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
import {useRouter} from 'vue-router'
export default {
    data() {
        return {
            router:useRouter(),
            form: {
                name: '',
                description: '',
                adresse: '',
                email: '',
                tel: '',
                image:null

            },
            errorMessage:{}
        }
    },
    methods: {
        getImage(e)
        {
            this.form.image=e.target.files[0]

        },
        Enregister()
        {
            let formdata=new FormData();
            formdata.append('name',this.form.name)
            formdata.append('description',this.form.description)
            formdata.append('adresse',this.form.adresse)
            formdata.append('email',this.form.email)
            formdata.append('tel',this.form.tel)
            formdata.append('image',this.form.image)

            axios.post('/api/gift/organisateur',formdata)
            .then((response)=>{
                Swal.fire({
                        position: 'top-end',
                        title: 'Enregistrement Organisateur',
                        icon: 'success',
                        text: 'Organisateur Enregistrer Avec Success',
                        showConfirmButton: false,
                        timer: 1500

                    })
                    this.errorMessage={}
                this.router.push('/dashboard/organisateur/')

            })
            .catch((error)=>{
                if( error.response.data.errors)
                {
                    this.errorMessage=error.response.data.errors
                }
            })
        }

    },
}
</script>

