<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {Inertia} from "@inertiajs/inertia";
import PanelLayout from "@/Layouts/PanelLayout.vue";

const props = defineProps<{
    unApprovedCompanies: Array<any>
    approvedCompanies: Array<any>
}>()

function approveCompany(companyId: number) {
    Inertia.post(`/panel/approve/${companyId}`)
}

function removeCompany(companyId: number) {
    Inertia.delete(`/panel/remove/${companyId}`)
}
</script>

<template>
    <Head title="Dashboard" />

    <PanelLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Panel</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <article class="flex justify-center items-center mx-auto">
                        <div v-for="(company, index) in approvedCompanies" :key="index">
                            <img :src="company.image" alt="">
                            <h1>{{ company.name }}</h1>
                            <button @click="removeCompany(company.id)">
                                Delete
                            </button>
                        </div>
                    </article>
                </div>

                <article class="flex justify-center items-center mx-auto gap-[10rem]">
                    <div v-for="(company, index) in unApprovedCompanies" :key="index">
                        <img :src="company.image" alt="Company Logo" class="w-[10rem] h-32 object-cover rounded-xl">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ company.name }}</h2>
                            <p class="text-gray-700 mb-2 text-sm">{{ company.description }}</p>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1H4a1 1 0 01-1-1V6zM3 12h2a1 1 0 001-1V8a1 1 0 00-1-1H3a1 1 0 00-1 1v3a1 1 0 001 1zm0 4h2a1 1 0 001-1v-3a1 1 0 00-1-1H3a1 1 0 00-1 1v3a1 1 0 001 1zM15 3a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V3zM15 8h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM15 13h2a1 1 0 001-1v-2a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                                <span class="text-gray-600">{{ company.type }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M4 6h16M4 14h16m-7 4h7" />
                                </svg>
                                <span class="text-gray-600">{{ company.place }}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <button class="bg-green-500/80 px-3 py-2 rounded flex items-center justify-center mx-auto" @click="approveCompany(company.id)">
                                Approve
                            </button>
                            <button class="bg-red-500/80 px-3 py-2 rounded flex items-center justify-center mx-auto" @click="removeCompany(company.id)">
                                Reject
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </PanelLayout>
</template>
