<template>
  <div>
    <button
      class="mybtn default mb-5"
      @click="ShowForm()"
    >
      Contatta la struttura
    </button>
  </div>
</template>

<script>
export default {
  name: "CreateMessagesButton",
  props: {
  },
  data() {
    return {
      ClickButton: false,
    };
  },
  computed: {},
  methods: {
    ShowForm(){
      this.ClickButton = true
      document.getElementById("target").classList.add("d-block")
    }
  },
  mounted() {  
  },
};
</script>