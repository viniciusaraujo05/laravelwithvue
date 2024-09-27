<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    name: '',
    price: '',
    description: '',
});

const saveProduct = () => {
    form.post(route('products.create'), {
        data: {
            name: form.name,
            price: form.price,
            description: form.description,
        },
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            alert('There was an error saving the product. Please try again.');
        },
    });
};

</script>

<template>
    <td class="px-6 py-4 whitespace-nowrap">
        <input type="text" v-model="form.name" placeholder="Product Name" class="border border-gray-300 rounded-md p-2"
            required />
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <input type="number" v-model="form.price" placeholder="Product Price"
            class="border border-gray-300 rounded-md p-2" required />
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <input type="text" v-model="form.description" placeholder="Product Description"
            class="border border-gray-300 rounded-md p-2" required />
    </td>
    <td colspan="4" class="px-6 py-4 whitespace-nowrap">
        <PrimaryButton @click="saveProduct">Add</PrimaryButton>
    </td>
</template>
