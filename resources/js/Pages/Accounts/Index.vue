<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    accounts: {
        type: Array,
    },
});


</script>

<template>
    <Head title="Account" />

    <AuthenticatedLayout>
        <template #header >
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <h2 class="col-span-4 font-semibold text-xl text-gray-800 leading-tight">Account</h2>
                <Link :href="route('accounts.create')" class="col-start-5 text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuovo Account</Link>
            </div>
        </template>

        <div class="container max-w-7xl mt-12 md:mt-24">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Saldo iniziale
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr 
                        v-for="account in accounts"
                        :key="account.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ account.title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ account.initial_balance }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <Link :href="route('accounts.edit', account.slug)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifica</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
