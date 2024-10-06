<script setup>

import {ref, onMounted} from 'vue';
import axios from 'axios';

const people = ref(null);

const getPeople = () => {
  axios.get('api/people', {})
      .then(response => {
        people.value = response.data
      })
      .catch(error => {
        console.error('Error adding data:', error.response.data);
      });
};

onMounted(() => {
  getPeople();
});

</script>

<template>
  <div>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Job</th>
        <th scope="col">Edit</th>
      </tr>
      </thead>
      <tbody>
      <template v-for="person in people">
        <tr>
          <th scope="row">{{ person.id }}</th>
          <td>{{ person.name }}</td>
          <td>{{ person.age }}</td>
          <td>{{ person.job }}</td>
          <td><a href="#" class="btn btn-success">Edit</a></td>
        </tr>
        <tr>
          <th scope="row">{{ person.id }}</th>
          <td><input type="text" class="form-control"></td>
          <td><input type="number" class="form-control"></td>
          <td><input type="text" class="form-control"></td>
          <td><a href="#" class="btn btn-success">Update</a></td>
        </tr>
      </template>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>
