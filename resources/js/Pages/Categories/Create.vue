<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const form = useForm({
    name: '',
    color: '',
    icon: '',
    monthly_budget: 0,
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
                
                <!-- <div>
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
                </div> -->

                <div class="flex items-center justify-end mt-4">

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salva
                    </PrimaryButton>
                </div>
            </form>
    
        </div>
    </AuthenticatedLayout>
</template>
