<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Inputs from './_Form.vue';

const props = defineProps({
    account: Object    
})

const form = useForm({
    title: props.account.title,
    initial_balance: props.account.initial_balance
});

const submit = () => {
    form.put(route('accounts.update', props.account.slug));
};
</script>

<template>
    <Head title="Modifica Account" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifica Account - {{ form.title }}</h2>
        </template>

        <div class="container mt-4 md:mt-12 px-4 md:px-12 lg:px-24 xl:px-56 ">

            <form @submit.prevent="submit">
                <input type="hidden" v-model="form.id">
                <inputs :form="form"></inputs>

                <div class="flex items-center justify-end mt-4">

                    <Link :href="route('accounts.index')" class="mr-4">
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
