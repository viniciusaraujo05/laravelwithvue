<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import create from '@/Components/CreateProduct.vue';
import useProductForm from '@/Composables/useProductForm';
import ProductRow from '@/Components/ProductRow.vue';

const props = defineProps(['products']);
const { form, editProductId, editProduct, updateProduct, deleteProduct } = useProductForm();
</script>

<template>
  <Head title="Products" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Products
      </h2>
    </template>

    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <create />
        <ProductRow
          v-for="product in products"
          :key="product.id"
          :product="product"
          :isEditing="editProductId === product.id"
          :form="form"
          @edit="() => editProduct(product)"
          @update="updateProduct"
          @delete="() => deleteProduct(product)" 
        />
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>
