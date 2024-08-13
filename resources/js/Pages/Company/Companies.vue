<template>
    <div class="flex flex-col items-center justify-center min-h-screen p-6 bg-gray-100">
        <div class="shadow-lg rounded-lg p-8 max-w-4xl w-full text-center bg-white">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                Companies
            </h1>
        </div>

        <!-- Filter Section -->
        <div class="mt-6 w-full max-w-4xl flex flex-wrap gap-4 justify-center">
            <select v-model="selectedCity" class="border border-gray-300 rounded-md p-2 bg-white">
                <option value="">All Cities</option>
                <option v-for="city in uniqueCities" :key="city" :value="city">{{ city }}</option>
            </select>

            <select v-model="selectedType" class="border border-gray-300 rounded-md p-2 bg-white">
                <option value="">All Types</option>
                <option v-for="type in uniqueTypes" :key="type" :value="type">{{ type }}</option>
            </select>
        </div>

        <p v-if="companies.length == 0">No companies found!</p>

        <!-- Companies List -->
        <div v-else v-if="filteredCompanies.length > 0" class="mt-8 w-full max-w-4xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div v-for="company in paginatedCompanies" :key="company.id" class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img :src="company.image" alt="Company Logo" class="w-full h-32 object-cover">
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
                </div>
            </div>

            <!-- Pagination controls -->
            <div v-if="totalPages > 1" class="flex justify-center mt-6 space-x-4">
                <button @click="changePage(currentPage - 1)" :disabled="currentPage <= 1" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 disabled:opacity-50">
                    Previous
                </button>
                <span class="flex items-center text-gray-700">
          Page {{ currentPage }} of {{ totalPages }}
        </span>
                <button @click="changePage(currentPage + 1)" :disabled="currentPage >= totalPages" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 disabled:opacity-50">
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';

const props = defineProps<{
    companies: Array<{
        id: number;
        name: string;
        description: string;
        type: string;
        place: string;
        image: string;
    }>
}>();

const currentPage = ref(1);
const itemsPerPage = 3;
const selectedCity = ref('');
const selectedType = ref('');

const uniqueCities = computed(() => {
    const cities = new Set(props.companies.map(company => company.place));
    return Array.from(cities);
});

const uniqueTypes = computed(() => {
    const types = new Set(props.companies.map(company => company.type));
    return Array.from(types);
});

const filteredCompanies = computed(() => {
    return props.companies.filter(company => {
        const cityMatch = !selectedCity.value || company.place === selectedCity.value;
        const typeMatch = !selectedType.value || company.type === selectedType.value;
        return cityMatch && typeMatch;
    });
});

const totalPages = computed(() => {
    return Math.ceil(filteredCompanies.value.length / itemsPerPage);
});

const paginatedCompanies = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredCompanies.value.slice(start, end);
});

function changePage(page: number) {
    if (page > 0 && page <= totalPages.value) {
        currentPage.value = page;
    }
}
</script>

<style scoped>
.company-card {
    transition: transform 0.3s;
}

.company-card:hover {
    transform: scale(1.03);
}
</style>
