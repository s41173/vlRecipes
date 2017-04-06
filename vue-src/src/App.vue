<template>
  <div id="app" class="container">
    <navbar></navbar>
    <recipes></recipes>
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import Recipes from './components/recipes/Recipes'

export default {
  name: 'app',
  components: {
    Navbar, Recipes
  }
}
</script>
