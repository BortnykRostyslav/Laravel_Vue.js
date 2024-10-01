<script setup>

import { reactive, computed } from 'vue';

import SinglePostComponent from "@/components/SinglePostComponent.vue";

const persons = reactive([
    {
        id: 1,
        name: 'Ivan',
        age: 26
    },
    {
        id: 2,
        name: 'Olena',
        age: 30
    },
    {
        id: 3,
        name: 'Mykola',
        age: 28
    },
    {
        id: 4,
        name: 'Anna',
        age: 22
    }
]);

function sayHello(){
    console.log('Hello');
}

function IvanJob(){
    return persons.name + ' працює програмістом.'
}

const oldPersons = computed(() => {
    return persons.filter(person => person.age > 25);
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
            </tr>
            </thead>
            <tbody>
            <tr v-for="person in oldPersons">
                <th scope="row">{{ person.id}}</th>
                <td>{{ person.name}}</td>
                <td>{{ person.age}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
