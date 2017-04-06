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
          <h4 class="modal-title">{{ recipe.name }}</h4>
        </div>
        <div class="modal-body">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="collapsed" @click="showIngr = !showIngr">
                    Bahan
                  </a>
                </h4>
              </div>
              <div :class="{
                  'panel-collapse': true,
                  'collapse': true,
                  'in': showIngr
                }">
                <div class="panel-body">
                  <ul>
                    <li v-for="ingr in recipe.ingredients">
                      {{ ingr.name }} {{ ingr.qty }} {{ ingr.unit }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="collapsed" @click="showStep = !showStep">
                    Langkah
                  </a>
                </h4>
              </div>
              <div :class="{
                  'panel-collapse': true,
                  'collapse': true,
                  'in': showStep
                }">
                <div class="panel-body">
                  <ul>
                    <li v-for="step in recipe.steps">
                      {{ step }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" @click="$emit('close')">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'ModalRecipe',
    props: [
      'recipe', 'show'
    ],
    data() {
      return {
        showIngr: true,
        showStep: false
      }
    }
  }
</script>