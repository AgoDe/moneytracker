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
            <InputLabel for="initial_balance" value="initial_balance" />
        
            <TextInput
                id="initial_balance"
                type="number"
                class="mt-1 block w-full"
                v-model="form.initial_balance"
                required
                autofocus
                autocomplete="initial_balance"
            />
        
            <InputError class="mt-2" :message="form.errors.initial_balance" />
        </div>
        
    </div>

</template>
    
