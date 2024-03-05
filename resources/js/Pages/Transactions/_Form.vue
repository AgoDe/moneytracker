<script setup>

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import NumberInput from '@/Components/NumberInput.vue';
import { ref } from 'vue';

const props = defineProps({
    form: {
        type: Object,
    },
});

let categories = ref([])
const loadingCategories = ref(true);
let accounts = ref([])
const loadingAccounts = ref(true);
let transactionTypes = ref([])
const loadingTransactionTypes = ref(true);

const getCategories = async () => {

    const response = await axios.get('/api/categories-with-subcategories').then((response) => {

        console.log(response.data)
        categories.value = response.data
    }).finally(() => {

        loadingCategories.value = false
    })
}

const getAccounts = async () => {

    const response = await axios.get('/api/accounts').then((response) => {

        console.log(response.data)
        accounts.value = response.data
    }).finally(() => {
        loadingAccounts.value = false
    })
}

const getTransactionTypes = async () => {

    const response = await axios.get('/api/transaction-types').then((response) => {

        console.log(response.data)
        transactionTypes.value = response.data
    }).finally(() => {

        loadingTransactionTypes.value = false
    })
}

const getLabel = (t) => {
    return t.title == 'Income' ? 'Entrata' : 'Uscita'
}

getCategories()
getAccounts()
getTransactionTypes()

const toFloat = () => {
    props.form.amount = parseFloat(props.form.amount).toFixed(2)
}


</script>

<template>

    <div>   
        <div class="flex items-center mb-4 gap-5">
            <div class="flex items-center mb-4" v-for="t in transactionTypes" :key="t.id">
                <input :id="'transaction_type_' + t.id" type="radio" :value="t.id" name="transaction_type_id" v-model="form.transaction_type_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label :for="'transaction_type_' + t.id" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ getLabel(t) }}</label>
            </div>
        </div>
        <div>
            <InputLabel for="account_id" value="Account" />
            <select
                v-if="!loadingAccounts"
                id="account_id"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                v-model="form.account_id"
            >
                <option
                    v-for="account in accounts"
                    :key="account.id"
                    :value="account.id"
                >
                    {{ account.title }}
                </option>
            </select>
            <InputError class="mt-2" :message="form.errors.account_id" />
        </div>

        <div class="mt-4">
            <InputLabel for="subcategory_id" value="Categoria" />
            <select
                v-if="!loadingCategories"
                id="subcategory_id"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                v-model="form.subcategory_id"
            >   
                <optgroup v-for="cat in categories" :key="cat.id" :label="cat.title">
                    <option
                        v-for="subcat in cat.subcategories"
                        :key="subcat.id"
                        :value="subcat.id"
                    >
                        {{ subcat.title }}
                    </option>
                </optgroup>
            </select>
            <InputError class="mt-2" :message="form.errors.subcategory_id" />
        </div>

        <div class="mt-4">
            <InputLabel for="description" value="Descrizione" />
        
            <TextInput
                id="description"
                type="text"
                class="mt-1 block w-full"
                v-model="form.description"
                required
                autofocus
                autocomplete="description"
            />
        
            <InputError class="mt-2" :message="form.errors.title" />
        </div>

        <div class="mt-4">
            <InputLabel for="date" value="Data" />
        
            <TextInput
                id="date"
                type="date"
                class="mt-1 block w-full"
                v-model="form.date"
                required
                autofocus
                autocomplete="date"
            />
        
            <InputError class="mt-2" :message="form.errors.date" />
        </div>

        <div class="mt-4">
            <InputLabel for="amount" value="Importo" />
        
            <input
                id="amount"
                type="number"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                v-model="form.amount"
                min="0"
                step="0.01"
                required
                autofocus
                autocomplete="amount"
                @change="toFloat()"
            />
        
            <InputError class="mt-2" :message="form.errors.amount" />
        </div>

        <div class="mt-4">
            <InputLabel for="notes" value="Note" />
        
            <TextInput
                id="notes"
                type="number"
                class="mt-1 block w-full"
                v-model="form.notes"
                autofocus
                autocomplete="notes"
            />
        
            <InputError class="mt-2" :message="form.errors.notes" />
        </div>
        
        
    </div>

</template>
    
