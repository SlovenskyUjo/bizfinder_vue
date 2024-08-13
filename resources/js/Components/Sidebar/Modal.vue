<template>
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center">
        <div class="bg-white p-5 rounded-lg w-full max-w-lg mx-4 z-50">
            <h2 class="text-xl font-bold mb-4">Add Your Company</h2>
            <form @submit.prevent="handleSubmit" class="space-y-4">
                <!-- Form Fields -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    />
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input
                        type="text"
                        id="description"
                        name="description"
                        v-model="form.description"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    />
                </div>

                <div>
                    <label for="place" class="block text-sm font-medium text-gray-700">Place</label>
                    <input
                        type="text"
                        id="place"
                        name="place"
                        v-model="form.place"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    />
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        @change="handleFileUpload"
                        class="mt-1 block w-full"
                    />
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input
                        type="text"
                        id="type"
                        name="type"
                        v-model="form.type"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    />
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    <button type="button" @click="$emit('close')" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineEmits } from 'vue';

const emit = defineEmits(['close']);

const form = useForm({
    name: '',
    description: '',
    place: '',
    image: '',
    type: ''
});

function handleSubmit() {
    console.log('Submitting form...');
    form.post('/dashboard', {
        onSuccess: () => {
            console.log('Form submitted successfully.');
            form.reset();
            emit('close'); // Zavrie modal po úspešnom odoslaní
        },
        onError: (errors) => {
            console.error('Form submission error:', errors);
        },
    });
}

function handleFileUpload(event) {
    const file = event.target.files[0];
    form.image = file;
}
</script>

<style scoped>
/* Ensure modal is centered and above all other content */
.fixed {
    z-index: 50; /* Ensure it is above other content */
}
</style>
