<script setup>

import {ref, defineProps, onMounted} from 'vue';
import axios from 'axios';

const name = ref('');
const age = ref(null);
const job = ref('');
const people = ref(null);
const editPersonId = ref(null);

function getPeople() {
    axios.get('api/people', {})
        .then(response => {
            people.value = response.data
        })
        .catch(error => {
            console.error('Error adding data:', error.response.data);
        });
}

function updatePerson(id) {
    editPersonId.value = null;
    axios.patch(`api/people/${id}`, {name: name.value, age: age.value, job: job.value})
        .then(response => {
            console.log('Person updated successfully:', response.data);
            getPeople();
        })
        .catch(error => {
            console.error('Error adding data:', error.response.data);
        });
}

function deletePerson(id) {
    axios.delete(`api/people/${id}`)
        .then(response => {
            console.log('Person updated successfully:', response.data);
            getPeople();
        })
        .catch(error => {
            console.error('Error adding data:', error.response.data);
        });
}

function changeEditPersonId(id, Name, Age, Job) {
    editPersonId.value = id;
    name.value = Name;
    age.value = Age;
    job.value = Job;
}

function isEdit(id) {
    return editPersonId.value === id
}

defineExpose({
    name,
    indexLog
});

onMounted(() => {
    getPeople();
    updatePerson();
    deletePerson();
    changeEditPersonId();
    isEdit();
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
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)"
                           class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" v-model="name" class="form-control"></td>
                    <td><input type="number" v-model="age" class="form-control"></td>
                    <td><input type="text" v-model="job" class="form-control"></td>
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
