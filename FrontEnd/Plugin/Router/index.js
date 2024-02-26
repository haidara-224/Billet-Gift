import { createRouter, createWebHistory} from "vue-router";
const routes=[
    {
        path:'/dashboard/evenement',
        component:()=>import('../../Components/Evenement/index.vue')

    },
    {
        path:'/dashboard/categorie',
        component:()=>import('../../Components/Categorie/index.vue')
    },
    {
        path:'/dashboard/lieux',
        component:()=>import('../../Components/Lieux/index.vue'),
    },
    {
        path:'/dashboard/organisateur',
        component:()=>import('../../Components/Organisateur/index.vue')
    }

]
const router=createRouter({
    history:createWebHistory(),
    routes
})
export default router
