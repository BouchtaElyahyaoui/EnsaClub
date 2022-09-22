<template>

  <header id="home">
    <nav class="navbar navbar-inverse navbar-expand-lg header-nav fixed-top light-header">
      <div class="container justify-content-center">
        <a class="navbar-brand" href="index.html">
          <img src="/storage/assets/images/logo.png" width="150px;" alt=""> <!-- Add your logo here -->
        </a>
      </div>
    </nav>
  </header>

  <section class="hero-area circle-wrap">
    <div class="circle x1"></div>
    <div class="circle x2"></div>
    <div class="circle x3"></div>
    <div class="circle x4"></div>
    <div class="circle x5"></div>
    <div class="circle x6"></div>
    <div class="circle x7"></div>
    <div class="circle x8"></div>
    <div class="circle x9"></div>
    <div class="circle x10"></div>
    <!-- End circle -->
    <div class="container">
      <div class="row full-height align-items-center">
        <div class="col-md-6 p-100px-t p-50px-b md-p-10px-b">
          <h2 class="text-capitalize m-25px-b">Ensa Club. <br> Where all the clubs reunites</h2>
          <p class="m-25px-b">Share Your Club Activities , Pictures , Achievements in one place .
          </p>
          <div class="hero-btn-wrapper text-center">
            <Link :href="route('register')" class="btn btn-default animated-btn" style="background : white;">Join Us
            Right Now
            </Link>
          </div>
        </div>
        <div class="col-md-6 p-100px-t p-50px-b md-p-10px-t ">
          <img class="hero-mock" src="/storage/assets/landing/img/hero-mock.png" alt="Hero mockup" />
        </div>
      </div>
    </div>
  </section>
</template>


<script>
import { defineComponent } from "vue"
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
  components: {
    Head,
    Link,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  }
})
</script>
