<template>
  <div>
    <button type="button" class="btn btn-primary my-2 mx-3">
      <a class="text-light" href="#"
        ><i class="fa fa-pencil-square text-secondary" aria-hidden="true">
          Modifica</i
        ></a
      >
    </button>

    <button class="btn btn-primary my-2 mx-3" id="viewMessage">
      Visualizza messaggi
    </button>

    <div id="target" class="hidden">
      <p>ciao</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "GuestSearch",
  props: {
    // EditLink: String,
    // StructureMessages: String,
    
  },
  computed: {},
};
</script>