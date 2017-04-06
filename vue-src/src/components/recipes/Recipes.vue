<template>
  <div>
      <h1>
        Recipes
        <button class="btn btn-primary pull-right" @click="modalCreateShow = true">New Recipe</button>
      </h1>
    <div class="row">
      <recipe
        v-for="recipe in recipes"
        :recipe="recipe"
        :key="recipe.id"
        @openModal="viewRecipe(recipe)">
      </recipe>
    </div>
    <modal-recipe
      :recipe="modalRecipe"
      :show="modalShow"
      @close="modalShow = false">
    </modal-recipe>
    <modal-create
      :show="modalCreateShow"
      @close="modalCreateShow = false"
      @submitted="modalCreateShow = false; getRecipes()">
    </modal-create>
  </div>
</template>

<script>
  import Recipe from '@/components/recipes/Recipe';
  import ModalRecipe from '@/components/recipes/Modal';
  import ModalCreate from '@/components/recipes/Create';

  export default {
    name: 'Recipes',
    data() {
      return {
        recipes: [],
        modalRecipe: {},
        modalShow: false,
        modalCreateShow: false
      }
    },
    methods: {
      getRecipes() {
        this.$http
          .get('api/recipes')
          .then((response) => {
            this.recipes = response.data;
          });
      },
      viewRecipe(recipe) {
        this.modalRecipe = recipe;
        this.modalShow = true;
      }
    },
    created() {
      this.getRecipes();
    },
    components: {
      Recipe, ModalRecipe, ModalCreate
    }
  }
</script>