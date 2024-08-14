<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white h-[89%] overflow-hidden shadow-sm sm:rounded-lg">
                    <article class="container p-10 w-full">
                        <h2 class="ms-4 font-bold text-lg">You're logged!</h2>

                    </article>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
