<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const props = defineProps({
    category: Object    
})

const form = useForm({
    id: props.category.id,
    name: props.category.name,
    color: props.category.color ?? '#ffffff',
    icon: props.category.icon,
    monthly_budget: props.category.monthly_budget,
});

const submit = () => {
    form.put(route('categories.update', props.category.id));
};
</script>

<template>
    <Head title="Modifica Categoria" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifica Categoria - {{ form.name }}</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 md:px-12 lg:px-24 xl:px-56 ">

            <form @submit.prevent="submit">
                <input type="hidden" v-model="form.id">
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

                    <Link :href="route('categories.index')" class="mr-4">
                        Indietro
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salva
                    </PrimaryButton>
                </div>
            </form>
    
        </div>
    </AuthenticatedLayout>
</template>
