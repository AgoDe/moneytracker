<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const form = useForm({
    title: '',
    color: '#ffffff',
});

const submit = () => {
    form.post(route('categories.store'));
};
</script>

<template>
    <Head title="Nuova Categoria" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuova Categoria</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 md:px-96 ">

            <form @submit.prevent="submit">
                <inputs :form="form"></inputs>

                <div class="flex items-center justify-end mt-4">

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salva
                    </PrimaryButton>
                </div>
            </form>
    
        </div>
    </AuthenticatedLayout>
</template>
