<template>
<div>


  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
                <h1>Dashbord</h1>
            </li>
            <li class="nav-item">
              <router-link to="/dashboard/evenement" class="nav-link">Evenement</router-link>

            </li>
            <li class="nav-item">
              <router-link to="/dashboard/organisateur" class="nav-link">Organisateurs</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/dashboard/lieux" class="nav-link">Lieux</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/dashboard/categorie" class="nav-link">Categorie</router-link>
            </li>


          </ul>
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

       <router-view></router-view>
      </main>
    </div>
  </div>
</div>

</template>
<script>

export default {


}
</script>
<style scoped>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  body {
    font-size: .875rem;
  }

  .feather {
    width: 16px;
    height: 16px;
    vertical-align: text-bottom;
  }

  /* Sidebar*/

  @media (max-width: 767.98px) {
    .sidebar {
      top: 5rem;
      height: 100vh;
    }
  }

  .sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: .5rem;
    overflow-x: hidden;
    overflow-y: auto;
    /* Scrollable contents if viewport is shorter than content. */
  }

  .sidebar .nav-link {
    font-weight: 500;
    color: #333;
  }

  .sidebar .nav-link .feather {
    margin-right: 4px;
    color: #727272;
  }

  .sidebar .nav-link.active {
    color: #007bff;
  }



  .sidebar-heading {
    font-size: .75rem;
    text-transform: uppercase;
  }

  /*Navbar*/
  .navbar-brand {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: 1rem;
    background-color: rgba(0, 0, 0, .25);
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
  }

  .navbar .navbar-toggler {
    top: .25rem;
    right: 1rem;
  }

  .navbar .form-control {
    padding: .75rem 1rem;
    border-width: 0;
    border-radius: 0;
  }

  .form-control-dark {
    color: #fff;
    background-color: rgba(255, 255, 255, .1);
    border-color: rgba(255, 255, 255, .1);
  }

  .form-control-dark:focus {
    border-color: transparent;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
  }

</style>




