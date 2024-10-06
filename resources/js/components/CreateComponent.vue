<script setup>

import { onMounted, ref } from 'vue';
import axios from 'axios';

import data from "bootstrap/js/src/dom/data.js";


const name = ref('');
const age = ref(null);
const job = ref('');

const addData = () => {
    // @ts-ignore
    axios.post('api/people', {
        name: name.value,
        age: age.value,
        job: job.value
    })
        .then(response => {
            name.value = '';
            age.value = null;
            job.value = '';

            console.log('Data added successfully:', response.data);
        })
        .catch(error => {
            console.error('Error adding data:', error.response.data);
        });
};

onMounted(() => {
    addData();
});

</script>

<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" id="name" v-model="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" id="age" v-model="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="job" v-model="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addData" type="submit" class="btn btn-primary" value="Add">
        </div>
    </div>
</template>

<style scoped>

</style>
