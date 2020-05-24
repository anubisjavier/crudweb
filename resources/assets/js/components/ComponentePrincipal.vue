<template>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <componente-formulario @new="addTarea"></componente-formulario>

      <componente-tarea
        v-for="(tarea, index) in tareas"
        :key="tarea.id"
        :tarea="tarea"
        @update="updateTarea(index, ...arguments)"
        @delete="deleteTarea(index)"
      >
      </componente-tarea>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tareas: [],
    };
  },

  mounted() {
    axios.get('http://74.207.233.6/tareas').then((response) => {
      this.tareas = response.data;
    });
  },

  methods: {
    addTarea(tarea) {
      this.tareas.push(tarea);
    },
    updateTarea(index, tarea) {
      this.tareas[index] = tarea;
    },
    deleteTarea(index) {
      this.tareas.splice(index, 1);
    },
  },
};
</script>
