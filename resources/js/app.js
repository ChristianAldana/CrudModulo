import './bootstrap';
import { createApp } from 'vue';
import ListStudents from './components/ListStudents.vue';
import CreateStudent from './components/CreateStudent.vue';

// Montar para el CRUD de estudiantes
const appEstudiantes = createApp({
  data() {
    return {
      mostrarEstudiantes: false, // Estado para controlar la visibilidad de la lista de estudiantes
    };
  },
  methods: {
    toggleEstudiantes() {
      this.mostrarEstudiantes = !this.mostrarEstudiantes;
    }
  }
});

// Registrar componentes para estudiantes
appEstudiantes.component('list-students', ListStudents);
appEstudiantes.component('create-student', CreateStudent);

// Montar la aplicación en el elemento con el id 'estudiantes-content'
appEstudiantes.mount('#estudiantes-content');
