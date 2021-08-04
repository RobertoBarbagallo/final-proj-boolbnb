<template>
  <div v-if="(this.show === '1' )">
    <div class="popUp">
        <div class="feedbackButton">
             <h3>Messaggio inviato con successo</h3>
               <div class="btn-row row d-flex justify-content-center align-items-center mt-1">
                    <button class="mybtn default px-4" @click="userConsent()">
                    Ok
                    </button>
                </div>
        </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CreatedMessagePopUp",
  props: {
      contactedstructure: String
  },
  data() {
    return {
        show: this.contactedstructure
    };
  },
  methods: {
    userConsent() {
        this.show = "0"
        console.log(this.show)
    },
  },
};
</script>
<style>
.popUp {
  background-color: rgba(255, 255, 255, 0.8);
  height: 100%;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 3;
}
.feedbackButton{
    background-color: white;
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%,-50%);
     padding: 20px;
     border: 2px solid #EA5C63;
     border-radius: 8px;
}
</style>