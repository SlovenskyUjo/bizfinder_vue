<template>
    <nav class="bg-gray-800 p-4 max-w-screen-lg mx-auto fixed top-4 left-4 right-4 z-40 rounded-lg shadow-lg">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="text-white text-xl font-bold">
                <a href="/">
                    <img src="/storage/bizfinder.png" class="size-10" alt="Logo">
                </a>
            </div>
            <!-- Toggle buttons for mobile menu -->
            <div class="lg:hidden flex items-center mx-auto">
                <!-- Show hamburger icon when menu is closed -->
                <button v-if="!isMenuOpen" @click="toggleMenu" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Show "X" icon when menu is open -->
                <button v-if="isMenuOpen" @click="toggleMenu" class="text-white z-50 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Desktop menu items -->
            <ul :class="['lg:flex lg:items-center lg:space-x-4', { 'hidden': isMenuOpen }]">
                <NavLink :href="route('welcome')" :active="route().current('welcome')" class="hidden lg:flex text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Home
                </NavLink>

                <NavLink :href="route('company.index')" :active="route().current('company.index')" class="hidden lg:flex text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                    </svg>
                    Companies
                </NavLink>

                <button @click="handleOpenModal" class="hidden lg:flex text-white px-3 py-2 text-sm hover:text-gray-500 transition duration-150 ease-in-out transform hover:scale-105 hover:border-[#0061FF] relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Add your company
                    <hr class="absolute top-9 inset-x-0 mx-auto border-0 rounded-b-lg w-12 border-b-[1px] border-t-2 border-[#0061FF]" />
                </button>

                <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="hidden lg:flex text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                    Dashboard
                </NavLink>
            </ul>
            <!-- Mobile menu -->
            <div v-if="isMenuOpen" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 lg:hidden px-4">
                <div class="flex flex-col items-center justify-center h-full">
                    <div class="flex flex-col items-center space-y-4">
                        <NavLink :href="route('welcome')" :active="route().current('welcome')" class="text-white hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Home
                        </NavLink>

                        <NavLink :href="route('company.index')" :active="route().current('company.index')" class="text-white hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                            </svg>

                            Companies
                        </NavLink>

                        <button @click="handleOpenModal" class="text-white flex px-3 py-2 text-sm hover:text-gray-500 transition duration-150 ease-in-out transform hover:scale-105 hover:border-[#0061FF] relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Add your company
                            <hr class="absolute top-9 inset-x-0 mx-auto border-0 rounded-b-lg w-12 border-b-[1px] border-t-2 border-[#0061FF]" />
                        </button>

                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            Dashboard
                        </NavLink>
                    </div>
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
/* Adjustments for mobile menu styling */
nav {
    padding-left: 16px;
    padding-right: 16px;
}
</style>
