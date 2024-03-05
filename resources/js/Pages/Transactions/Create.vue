<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const form = useForm({
    account_id: 0,
    subcategory_id: 0,
    transaction_type_id: 1,
    description: '',
    date: new Date().toISOString().split('T')[0],
    amount: new Float32Array([0]),
    notes: '',
});

const submit = () => {
    form.post(route('transactions.store'));
};

</script>

<template>
    <Head title="Nuova transazione" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuova transazione</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 lg:xl:px-96 ">

            <form @submit.prevent="submit">
                <inputs :form="form"></inputs>

                <div class="flex items-center justify-end mt-4">
                    
                    <Link :href="route('transactions.index')" class="mr-4">Indietro</Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salva
                    </PrimaryButton>
                </div>
            </form>
    
        </div>
    </AuthenticatedLayout>
</template>
