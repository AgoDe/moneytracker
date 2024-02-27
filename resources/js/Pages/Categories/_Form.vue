<script setup>

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    form: {
        type: Object,
    },
});

</script>

<template>

    <div>

        <div>
            <InputLabel for="name" value="Nome" />
        
            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
        
            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        
        <div class="mt-4">
            <InputLabel for="color" value="Colore" />
        
            <TextInput
                type="color"
                id="color"
                class="mt-1 block w-full"
                v-model="form.color"
            />
        
            <InputError class="mt-2" :message="form.errors.color" />
        </div>
        
        <div class="mt-4">
            <InputLabel for="icon" value="Icona" />
        
            <TextInput
                id="icon"
                type="text"
                class="mt-1 block w-full"
                v-model="form.icon"
            />
        
            <InputError class="mt-2" :message="form.errors.icon" />
        </div>
        
        <div class="mt-4">
            <InputLabel for="monthly_budget" value="Budget mensile" />
        
            <TextInput
                id="monthly_budget"
                type="number"
                class="mt-1 block w-full"
                v-model="form.monthly_budget"
            />
        
            <InputError class="mt-2" :message="form.errors.monthly_budget" />
        </div>
    </div>

</template>
    
