<!-- components/ProductRow.vue -->
<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
  product: Object,
  isEditing: Boolean,
  form: Object,
  onEdit: Function,
  onUpdate: Function,
  onDelete: Function,
});
</script>

<template>
  <tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <input v-if="isEditing" v-model="form.name" class="border border-gray-300 rounded-md p-2" />
      <span v-else>{{ product.name }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <input v-if="isEditing" v-model="form.price" type="number" class="border border-gray-300 rounded-md p-2" />
      <span v-else>{{ product.price }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <input v-if="isEditing" v-model="form.description" class="border border-gray-300 rounded-md p-2" />
      <span v-else>{{ product.description }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <PrimaryButton v-if="isEditing" @click="onUpdate">Save</PrimaryButton>
      <PrimaryButton v-else @click="onEdit">Edit</PrimaryButton>
      <DangerButton @click="onDelete">Delete</DangerButton>
    </td>
  </tr>
</template>
