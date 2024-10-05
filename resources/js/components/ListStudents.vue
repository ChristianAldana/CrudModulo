<template>
    <div>
      <h1>Students List</h1>
      <ul>
        <li v-for="student in students" :key="student.id">
          {{ student.name }} - {{ student.email }}
          <button @click="deleteStudent(student.id)">Delete</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        students: [],
      };
    },
    mounted() {
      this.getStudents();
    },
    methods: {
      async getStudents() {
        const response = await fetch('/api/students');
        const data = await response.json();
        this.students = data;
      },
      async deleteStudent(id) {
        await fetch(`/api/students/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
        });
        this.getStudents();
      }
    }
  };
  </script>
  