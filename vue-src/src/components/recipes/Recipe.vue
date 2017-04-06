<template>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img :src="recipe.img" :alt="recipe.name">
      <div class="caption">
        <h3>{{ recipe.name }}</h3>
        <p>
          <a href="#" class="btn btn-primary" role="button" @click="$emit('openModal')">View</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'Recipe',
    props: [
        'recipe'
    ]
  }
</script>