<template>
  <div class="dropdown">
    <button
      class="btn btn-primary"
      @click="ShowMessages"
    >
      Visualizza messaggi
    </button>
    <div v-if="this.ClickMessages">
      <div class="card" v-for="message in this.messages" :key="message.id">
        <div class="card-header">Messaggio</div>
        <div class="card-body">
          <h5 class="card-title">{{ message.sender_email }}</h5>
          <p class="card-text">{{ message.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ShowMessagesButton",
  props: {
    structuremessages: Array,
  },
  data() {
    return {
      ClickMessages: false,
      messages: this.structuremessages
    };
  },
  computed: {},
  methods: {
    ShowMessages() {
      this.ClickMessages = !this.ClickMessages;
    },
  },
  mounted() {
  },
};
</script>
<style>
.dropdown {
  width: 300px
}

</style>