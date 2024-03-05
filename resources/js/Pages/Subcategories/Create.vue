<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const form = useForm({
    title: '',
    monthly_budget: 0,
    category_id: 0
});

const submit = () => {
    form.post(route('subcategories.store'));
};
</script>

<template>
    <Head title="Nuova Sottocategoria" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuova Sottocategoria</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 md:px-96 ">

            <form @submit.prevent="submit">
                <inputs :form="form"></inputs>

                <div class="flex items-center justify-end mt-4">

                    <Link :href="route('subcategories.index')" class="mr-4">
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
