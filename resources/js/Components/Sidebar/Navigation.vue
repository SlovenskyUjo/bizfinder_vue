<template>
    <nav class="bg-gray-800 p-4 w-full fixed z-40">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-xl font-bold">MojeLogo</div>
            <div class="lg:hidden">
                <!-- Zobrazí sa iba hamburger ikona, keď je menu zatvorené -->
                <button v-if="!isMenuOpen" @click="toggleMenu" class="text-white focus:outline-none absolute right-4 top-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Zobrazí sa iba ikona "X", keď je menu otvorené -->
                <button v-if="isMenuOpen" @click="toggleMenu" class="text-white focus:outline-none absolute right-4 top-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Desktopové menu -->
            <ul :class="['lg:flex lg:items-center lg:space-x-4', 'lg:space-y-0', { 'hidden': isMenuOpen }]">
                <NavLink :href="route('welcome')" :active="route().current('welcome')" class="lg:flex lg:items-center lg:space-x-4 hidden text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6 mr-2">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Home
                </NavLink>

                <NavLink :href="route('company.index')" :active="route().current('company.index')" class="lg:flex lg:items-center lg:space-x-4 hidden text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6 mr-2">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Companies
                </NavLink>

                <button @click="handleOpenModal" class="lg:flex lg:items-center lg:space-x-4 hidden text-white text-sm hover:text-gray-700 hover:border-b-2 hover:border-gray-300 transition duration-150 ease-in-out'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    Add your company
                </button>

                <NavLink :href="route('company.index')" :active="route().current('company.index')" class="lg:flex lg:items-center lg:space-x-4 hidden text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>

                    Dashboard
                </NavLink>
            </ul>
            <!-- Mobilné menu -->
            <div v-if="isMenuOpen" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 lg:hidden">
                <div class="absolute top-0 right-0 p-4">
                    <!-- Ikona "X" na zatvorenie menu -->
                    <button @click="toggleMenu" class="text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col items-center justify-center h-full">
                    <a href="#" class="text-white text-xl mb-4 hover:text-gray-400">Domov</a>
                    <a href="#" class="text-white text-xl mb-4 hover:text-gray-400">O nás</a>
                    <a href="#" class="text-white text-xl mb-4 hover:text-gray-400">Služby</a>
                    <a href="#" class="text-white text-xl mb-4 hover:text-gray-400">Kontakt</a>
                </div>
            </div>
        </div>

        <!-- Render the modal if it's open -->
        <Modal v-if="isModalOpen" @close="handleCloseModal" @submit="handleSubmit" />
    </nav>
</template>

<script setup>
import { ref } from 'vue';
import NavLink from "@/Components/NavLink.vue";
import Modal from "@/Components/Sidebar/Modal.vue";

const isMenuOpen = ref(false);
const isModalOpen = ref(false);

const handleOpenModal = () => {
    isModalOpen.value = true;
};

const handleCloseModal = () => {
    isModalOpen.value = false;
};

function toggleMenu() {
    isMenuOpen.value = !isMenuOpen.value;
}
</script>

<style scoped>
/* Môžeš pridať ďalšie štýly podľa potreby */
</style>
