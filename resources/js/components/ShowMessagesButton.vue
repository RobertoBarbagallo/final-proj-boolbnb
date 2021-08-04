<template>
  <div >
    <button
      class="btn button-message my-5"
      @click="ShowMessages"
    >
     <i class="fas fa-eye"></i> Visualizza messaggi
    </button>
    <div v-if="this.ClickMessages">
      <div class="card" v-for="message in this.messages" :key="message.id">
        <div class="card-header">{{ message.sender_email }}</div>
        <div class="card-body">
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