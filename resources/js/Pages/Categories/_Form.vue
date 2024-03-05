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
        
        
    </div>

</template>
    
