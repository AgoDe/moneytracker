<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links : Object
});

const getClass = (link) => {

    const classString = "";

    if (link.active)
    {
        classString += "z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white";
    }
    else 
    {
        classString += "flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
    }






}

</script>

<template>
    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-10 text-base">

            <li v-for="link in links">
                <Component
                :is="link.url ? Link : 'span'"
                :href="link.url"
                v-html="link.label"
                :class="link.active ? 'z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : 'flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'"
                :aria-current="link.url ? 'page' : ''"
                />
            </li>
        
        </ul>
    </nav>
</template>


