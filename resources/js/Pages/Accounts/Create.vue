<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const form = useForm({
    title: '',
    initial_balance: 0,
});

const submit = () => {
    form.post(route('accounts.store'));
};

</script>

<template>
    <Head title="Nuovo Account" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuovo Account</h2>
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
