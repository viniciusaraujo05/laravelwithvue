import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

export default function useProductForm() {
  const editProductId = ref(null);
  const form = useForm({
    name: '',
    price: '',
    description: '',
  });

  const editProduct = (product) => {
    editProductId.value = product.id;
    form.name = product.name;
    form.price = product.price;
    form.description = product.description;
  };

  const updateProduct = () => {
    form.patch(route('products.update', editProductId.value), {
      onSuccess: () => {
        editProductId.value = null;
        form.reset();
      },
      onError: (errors) => {
        alert('Error updating product: ' + Object.values(errors).join(', '));
      },
    });
  };

  const deleteProduct = (product) => {
    form.delete(route('products.destroy', product.id), {
      onSuccess: () => {
        editProductId.value = null;
        form.reset();
      },
      onError: (errors) => {
        alert('Error deleting product: ' + Object.values(errors).join(', '));
      },
    });
  };

  return {
    form,
    editProductId,
    editProduct,
    updateProduct,
    deleteProduct,
  };
}
