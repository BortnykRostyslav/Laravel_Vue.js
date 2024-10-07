<script setup>

import {ref, onMounted} from 'vue';
import axios from 'axios';

import CreateComponent from "@/components/CreateComponent.vue";
import IndexComponent from "@/components/IndexComponent.vue";

import data from "bootstrap/js/src/dom/data.js";

const persons = ref(null);
const index = ref(null);


// function getPersons() {
//     axios.get('/persons')
//         .then(response  => {
//             persons.value = response.data;
//         })
// }


onMounted(() => {
    console.log(index.value.name);
});

</script>

<template>
    <div>
        <CreateComponent></CreateComponent>
        <IndexComponent></IndexComponent>
        <!--        <table class="table">-->
        <!--            <thead>-->
        <!--            <tr>-->
        <!--                <th scope="col">ID</th>-->
        <!--                <th scope="col">Name</th>-->
        <!--                <th scope="col">Age</th>-->
        <!--                <th scope="col">Job</th>-->
        <!--            </tr>-->
        <!--            </thead>-->
        <!--            <tbody>-->
        <!--            <tr v-for="person in persons">-->
        <!--                <th scope="row">{{ person.id }}</th>-->
        <!--                <td>{{ person.name }}</td>-->
        <!--                <td>{{ person.age }}</td>-->
        <!--                <td>{{ person.job }}</td>-->
        <!--            </tr>-->
        <!--            </tbody>-->
        <!--        </table>-->
    </div>
</template>

<style scoped>

</style>
