<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const props = defineProps({
    subcategory: Object    
})

const form = useForm({
    title: props.subcategory.title,
    category_id: props.subcategory.category_id,
    monthly_budget: props.subcategory.monthly_budget,
});

const submit = () => {
    form.put(route('subcategories.update', props.subcategory.slug));
};
</script>

<template>
    <Head title="Modifica Categoria" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifica Categoria - {{ form.title }}</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 md:px-12 lg:px-24 xl:px-56 ">

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
