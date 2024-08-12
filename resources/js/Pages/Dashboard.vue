<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps<{
    unApprovedCompanies: Array<any>
    approvedCompanies: Array<any>
}>()

function approveCompany(companyId: number) {
    Inertia.post(`/dashboard/approve/${companyId}`)
}

function removeCompany(companyId: number) {
    Inertia.delete(`/dashboard/remove/${companyId}`)
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div v-for="(company, index) in approvedCompanies" :key="index">
                        <h1>{{ company.name }}</h1>
                        <button @click="removeCompany(company.id)">
                            Delete
                        </button>
                    </div>
                </div>

                <div v-for="(company, index) in unApprovedCompanies" :key="index">
                    <h1>{{ company.name }}</h1>
                    <button @click="approveCompany(company.id)">
                        Approve
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
