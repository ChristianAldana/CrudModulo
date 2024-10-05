<template>
    <div>
      <h1>Create New Student</h1>
      <form @submit.prevent="createStudent">
        <input v-model="name" placeholder="Name">
        <input v-model="email" placeholder="Email">
        <input v-model="age" placeholder="Age">
        <input v-model="course" placeholder="Course">
        <button type="submit">Create</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        age: '',
        course: ''
      };
    },
    methods: {
      async createStudent() {
        const studentData = {
          name: this.name,
          email: this.email,
          age: this.age,
          course: this.course,
        };
  
        await fetch('/api/students', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(studentData),
        });
  
        this.name = '';
        this.email = '';
        this.age = '';
        this.course = '';
        this.$emit('studentCreated');
      }
    }
  };
  </script>
  