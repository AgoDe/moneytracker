<script setup>

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

defineProps({
    form: {
        type: Object,
    },
});

let categories = ref([])
const loading = ref(true);

const getCategories = async () => {

    const response = await axios.get('/api/categories').then((response) => {

        console.log(response.data)
        categories.value = response.data
    }).finally(() => {

        loading.value = false
    })
}

getCategories()
</script>

<template>

    <div>

        <div>
            <InputLabel for="category_id" value="Categorie" />
            <select
                v-if="!loading"
                id="category_id"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                v-model="form.category_id"
            >
                <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                >
                    {{ category.title }}
                </option>
            </select>
            <InputError class="mt-2" :message="form.errors.category_id" />
        </div>

        <div>
            <InputLabel for="title" value="Nome" />
        
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
                autofocus
                autocomplete="title"
            />
        
            <InputError class="mt-2" :message="form.errors.title" />
        </div>

        <div>
            <InputLabel for="monthly_budget" value="Nome" />
        
            <TextInput
                id="monthly_budget"
                type="text"
                class="mt-1 block w-full"
                v-model="form.monthly_budget"
                required
                autofocus
                autocomplete="monthly_budget"
            />
        
            <InputError class="mt-2" :message="form.errors.monthly_budget" />
        </div>
        
        
    </div>

</template>
    
