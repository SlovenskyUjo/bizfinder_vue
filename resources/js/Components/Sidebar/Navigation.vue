<template>
    <div>
        <div
            :class="containerClass"
            class="bg-neutral-900 flex flex-col z-10 gap-5 p-5 absolute top-0 left-0 h-full shadow shadow-neutral-700"
        >
            <!-- Header with arrow button at the top -->
            <div class="flex flex-row w-full justify-between items-center">
                <a href="/">
                    <img
                        src="/storage/bizfinder.png"
                        alt="bizfinder-logo"
                        class="h-10 w-10 rounded-full"
                    />
                </a>
                <button
                    class="p-1 rounded-full flex"
                    @click="handleOpenClose"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1"
                        stroke="currentColor"
                        class="w-8 h-8 stroke-neutral-200"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                        />
                    </svg>
                </button>
            </div>

            <!-- Centered navigation links -->
            <div class="flex-grow flex flex-col justify-center gap-3">
                <NavLink
                    class="flex p-1 rounded cursor-pointer stroke-[0.75] hover:stroke-neutral-100 stroke-neutral-400 text-neutral-400 hover:text-neutral-100 place-items-center gap-3 hover:bg-neutral-700/30 transition-colors duration-100"
                    :href="route('welcome')"
                    :active="route().current('welcome')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="stroke-inherit stroke-[0.75] min-w-8 w-8">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>

                    <p v-if="isOpen" class="text-inherit font-poppins overflow-clip whitespace-nowrap tracking-wide text-[15px]">
                        Home
                    </p>
                </NavLink>

                <NavLink
                    class="flex p-1 rounded cursor-pointer stroke-[0.75] hover:stroke-neutral-100 stroke-neutral-400 text-neutral-400 hover:text-neutral-100 place-items-center gap-3 hover:bg-neutral-700/30 transition-colors duration-100"
                    :href="route('company.index')"
                    :active="route().current('company.index')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="stroke-inherit stroke-[0.75] min-w-8 w-8">
                        <path d="M16.5 6a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v7.5a3 3 0 0 0 3 3v-6A4.5 4.5 0 0 1 10.5 6h6Z" />
                        <path d="M18 7.5a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3H18Z" />
                    </svg>


                    <p v-if="isOpen" class="text-inherit font-poppins overflow-clip whitespace-nowrap tracking-wide text-[15px]">
                        Companies
                    </p>
                </NavLink>

                <button
                    @click="handleOpenModal"
                    class="flex p-1 rounded cursor-pointer stroke-[0.75] hover:stroke-neutral-100 stroke-neutral-400 text-neutral-400 hover:text-neutral-100 place-items-center gap-3 hover:bg-neutral-700/30 transition-colors duration-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="stroke-inherit stroke-[0.75] min-w-8 w-8">
                        <path fillRule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                    </svg>

                    <p v-if="isOpen" class="text-inherit font-poppins overflow-clip whitespace-nowrap tracking-wide text-[15px]">
                        Add your company
                    </p>
                </button>

                <NavLink
                    class="flex p-1 rounded cursor-pointer stroke-[0.75] hover:stroke-neutral-100 stroke-neutral-400 text-neutral-400 hover:text-neutral-100 place-items-center gap-3 hover:bg-neutral-700/30 transition-colors duration-100"
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="stroke-inherit stroke-[0.75] min-w-8 w-8">
                        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
                    </svg>


                    <p v-if="isOpen" class="text-inherit font-poppins overflow-clip whitespace-nowrap tracking-wide text-[15px]">
                        Dashboard
                    </p>
                </NavLink>
            </div>
        </div>

        <!-- Render the modal if it's open -->
        <Modal v-if="isModalOpen" @close="handleCloseModal" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import NavLink from "@/Components/NavLink.vue";
import Modal from "@/Components/Sidebar/Modal.vue";

const isOpen = ref(false);
const isModalOpen = ref(false);

const containerClass = computed(() => {
    return isOpen.value ? "w-full md:w-64" : "w-20";
});

const handleOpenClose = () => {
    isOpen.value = !isOpen.value;
};

const handleOpenModal = () => {
    isModalOpen.value = true;
};

const handleCloseModal = () => {
    isModalOpen.value = false;
};

interface SubmitData {
    name: string;
    description: string;
    place: string;
    image: string;
    type: string;
}

const handleSubmit = (data: SubmitData) => {
    console.log("Submitted Data:", data);
    // Add your submit logic here
    // e.g., send the data to an API
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
