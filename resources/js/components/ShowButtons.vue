<template>
  <div>
    <button type="button" class="btn btn-primary my-2 mx-3">
      <a class="text-light" :href="this.EditLink"
        ><i class="fa fa-pencil-square text-secondary" aria-hidden="true">
          Modifica</i
        ></a
      >
    </button>

    <button
      class="btn btn-primary"
      v-if="(this.StructureMessages.lenght >0)"
      @click="ShowMessages"
    >
      Visualizza messaggi
    </button>
    <div v-if="this.ClickMessages">
      <div class="card" v-for="meessage in StructureMessages"
        :key="meessage.id">
        <div class="card-header">Messaggio</div>
        <div class="card-body">
          <h5 class="card-title">{{ meessage.sender_email }}</h5>
          <p class="card-text">{{ meessage.content }}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "GuestSearch",
  props: {
    EditLink: String,
    StructureMessages: JSON,
  },
  data() {
    return {
      ClickMessages: false,
    };
  },
  computed: {},
  methods: {
    ShowMessages() {
      this.ClickMessages = !this.ClickMessages;
    },
  },
  mounted() {

    this.StructureMessages = JSON.parse(StructureMessages);
  
  },
};
</script>