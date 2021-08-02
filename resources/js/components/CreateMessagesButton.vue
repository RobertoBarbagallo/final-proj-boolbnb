<template>
  <div>
    <button
      class="btn btn-primary"
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
    // StructureMessages: JSON,
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
      document.getElementById("target").classList.add("show")
    }

  },
  mounted() {  
  },
};
</script>