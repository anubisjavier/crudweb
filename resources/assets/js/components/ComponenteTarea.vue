<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      Tarea Creada: {{ tarea.created_at }} - Última actualización:
      {{ tarea.updated_at }}
    </div>

    <div class="panel-body">
      <input
        v-if="editMode"
        type="text"
        class="form-control"
        v-model="tarea.description"
      />
      <p v-else>{{ tarea.description }}</p>
    </div>

    <div class="panel-footer">
      <button
        v-if="editMode"
        class="btn btn-success"
        v-on:click="onClickUpdate()"
      >
        Guardar Cambios
      </button>
      <button v-else class="btn btn-default" v-on:click="onClickEdit()">
        Editar
      </button>

      <button class="btn btn-danger" v-on:click="onClickDelete()">
        Eliminar Tarea
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['tarea'],
  data() {
    return {
      editMode: false,
    };
  },
  mounted() {
    console.log('Componente montado.');
  },
  methods: {
    onClickDelete() {
      axios.delete(`http://74.207.233.6/tareas/${this.tarea.id}`).then(() => {
        this.$emit('delete');
      });
    },
    onClickEdit() {
      this.editMode = true;
    },
    onClickUpdate() {
      const params = {
        description: this.tarea.description,
      };
      axios
        .put(`http://74.207.233.6/tareas/${this.tarea.id}`, params)
        .then((response) => {
          this.editMode = false;
          const tarea = response.data;
          this.$emit('update', tarea);
        });
    },
  },
};
</script>
