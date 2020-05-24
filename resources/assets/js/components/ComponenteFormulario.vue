<template>
  <div class="panel panel-default">
    <div class="panel-heading">¿Qué tarea quieres crear?</div>

    <div class="panel-body">
      <form action="" v-on:submit.prevent="newTarea()">
        <div class="form-group">
          <label for="tarea">Escriba la Tarea a crear</label>
          <input
            type="text"
            class="form-control"
            name="tarea"
            v-model="description"
          />
        </div>
        <button type="submit" class="btn btn-primary">
          Crear Tarea
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      description: '',
    };
  },
  mounted() {
    console.log('Componente Montado.');
  },
  methods: {
    newTarea() {
      const params = {
        description: this.description,
      };
      this.description = '';

      axios
        .post('http://74.207.233.6/tareas', params)
        .then((response) => {
          const tarea = response.data;
          this.$emit('new', tarea);
        })
        .catch((e) => {
          console.log(e.error);
        });
    },
  },
};
</script>
