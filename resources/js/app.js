import './bootstrap';
import '../js/bootstrap.min.css'
import '../js/bootstrap.bundle.min.js'
import '@fortawesome/fontawesome-free/css/all.css';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/dist/sweetalert2.css'
window.Swal=Swal
const toast=Swal.mixin({
    toast:true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000,
    timeProgressBar:true
})

window.toast=toast
import Alpine from 'alpinejs';
import '../../FrontEnd'
window.Alpine = Alpine;
Alpine.start();

