<template>
  <div :class="{
      modal: true,
      fade: true,
      'in': show
    }"
    :style="{
      display: (show) ? 'block':'none'
    }"
    tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" @click="$emit('close')"><span>&times;</span></button>
          <h4 class="modal-title">New Recipe</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama" v-model="recipe.name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Foto" v-model="recipe.img">
          </div>
          <hr>

          <div class="form-group">
            <h4>
              Bahan
              <button class="btn btn-info" @click="formIngr('add')">+</button>
              <button class="btn btn-warning" @click="formIngr('subtract')">-</button>
            </h4>
          </div>
          <div class="form-group" v-for="ingr in recipe.ingredients">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Nama" v-model="ingr.name">
              </div>
              <div class="col-md-4">
                <input type="number" class="form-control" placeholder="Jumlah" v-model="ingr.qty">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Satuan" v-model="ingr.unit">
              </div>
            </div>
          </div>
          <hr>
          
          <div class="form-group">
            <h4>
              Langkah
              <button class="btn btn-info" @click="formStep('add')">+</button>
              <button class="btn btn-warning" @click="formStep('subtract')">-</button>
            </h4>
          </div>
          <div class="form-group" v-for="step, index in recipe.steps">
            <input type="text" class="form-control" placeholder="Step" v-model="recipe.steps[index]">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" @click="$emit('close')">Close</button>
          <button type="button" class="btn btn-primary" @click="submitForm">Submit</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'ModalCreate',
    props: [
      'show'
    ],
    data() {
      return {
        recipe: {
          name: '',
          img: '',
          ingredients: [{
            name: '',
            qty: 0,
            unit: ''
          }],
          steps: [
            ''
          ]
        }
      }
    },
    methods: {
      formIngr(op) {
        if(op === 'add') {
          this.recipe.ingredients.push({
            name: '',
            qty: 0,
            unit: ''
          });
        } else if(op === 'subtract') {
          if(this.recipe.ingredients.length > 1) {
            this.recipe.ingredients.splice(-1, 1);
          }
        }
      },
      formStep(op) {
        if(op === 'add') {
          this.recipe.steps.push('');
        } else if(op === 'subtract') {
          if(this.recipe.steps.length > 1) {
            this.recipe.steps.splice(-1, 1);
          }
        }
      },
      submitForm() {
        this.$http
          .post('api/recipes', this.recipe)
          .then((response) => {
            this.$emit('submitted');
          });
      }
    }
  }
</script>