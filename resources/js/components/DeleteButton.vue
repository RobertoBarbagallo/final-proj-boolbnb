<template>
  <div>
    <div v-if="clickDelete" class="deleteForm">
        <div class="formButton">
             <h1 class="mydetailstitle ">Sei sicuro di voler eliminare la struttura?</h1>
             <div class="text-center">
                <button class="btn button-message btn-danger text-white">
                <a href="#" class="text-white"
             >
              Elimina</a
                 >
                </button>
                <a href="#" class="btn button-message btn-danger text-white" @click="clikDelete">Annulla</a>
                </div>
        </div>
    </div>
        <div>
             <div class="btn mydetailstitle" @click="clikDelete"><i class="fas fa-trash"></i> Cancella</div>
        </div>
  </div>
</template>
<script>
export default {
  name: "DeleteButton",
  props: {
    DeleteLink: String,
  },
  data() {
    return {
      clickDelete: false,
      form: ""
    };
  },
  methods: {
    clikDelete() {
      this.clickDelete = !this.clickDelete;
    },
  },
};
</script>
<style>
.deleteForm {
  background-color: rgba(255, 255, 255, 0.8);
  height: 100%;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 3;
}
.formButton{
    background-color: white;
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%,-50%);
     padding: 20px;
     border: 1px solid #EA5C63;
}
</style>