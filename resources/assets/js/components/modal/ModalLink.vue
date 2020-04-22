<template>
  <span>
    <span v-if="item">
      <button
        v-on:click="form()"
        type="button"
        v-bind:class="css"
        data-toggle="modal"
        v-bind:data-target="'#' +name"
      >{{title}}</button>
    </span>

    <span v-if="!item">
      <button
        type="button"
        v-bind:class="css"
        data-toggle="modal"
        v-bind:data-target="'#' +name"
      >{{title}}</button>
    </span>
  </span>
</template>

<script>
export default {
  props: ["name", "title", "css", "item", "item", "url"],
  methods: {
    form: function() {
      axios.get(this.url + this.item.id).then(res => {
        console.log(res.data);
        this.$store.commit("setItem", res.data);
      });
    }
  }
};
</script>
