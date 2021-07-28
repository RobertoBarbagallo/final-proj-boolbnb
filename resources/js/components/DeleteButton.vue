<template>
  <div>
    <div v-if="clickDelete" class="deleteForm">
        <div class="formButton">
             <h1>Sei sicuro di voler eliminare la struttura?</h1>
                <button class="btn btn-danger">
                <a href="#"
             ><i class="fa fa-trash text-white" aria-hidden="true">
              Elimina</i
             ></a
                 >
                </button>
                <a href="#" class="btn btn-danger" @click="clikDelete">Annulla</a>
        </div>
    </div>
        <div>
             <div class="btn btn-danger" @click="clikDelete">Cancella</div>
        </div>
  </div>
</template>

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
     border: 1px solid black;

}

</style>