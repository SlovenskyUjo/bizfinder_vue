<template>
    <div class="flex flex-col items-center justify-center min-h-screen sm:p-6 md:p-8">
        <div
            class="shadow-lg rounded-lg p-4 sm:p-6 md:p-8 max-w-full md:max-w-2xl w-full text-center transition-transform transition-opacity duration-600"
            :class="{ 'opacity-0 scale-90': !isVisible, 'opacity-100 scale-100': isVisible }"
            @transitionend="handleTransitionEnd"
        >
            <h1
                class="text-xl sm:text-2xl md:text-4xl font-extrabold text-gray-300 mb-4 transition-transform transition-opacity duration-600"
                :class="{ 'opacity-0 -translate-y-5': !isVisible, 'opacity-100 translate-y-0': isVisible }"
            >
                Nájdite podniky vo vašom okolí rýchlo a jednoducho
            </h1>
            <p
                class="text-sm sm:text-base text-white md:text-lg mt-4 sm:mt-6 md:mt-8 leading-relaxed transition-transform transition-opacity duration-600"
                :class="{ 'opacity-0 translate-y-5': !isVisible, 'opacity-100 translate-y-0': isVisible }"
            >
                Vitajte v našej aplikácii, ktorá vám pomôže nájsť najlepšie podniky vo
                vašom okolí. Či už hľadáte reštaurácie, kaviarne, obchody alebo služby,
                naša platforma vám poskytne prehľad najbližších možností. Vďaka našim
                pokročilým filtrom a recenziám od používateľov si môžete byť istí, že
                nájdete presne to, čo potrebujete. Začnite objavovať už dnes a zistite,
                čo všetko vaše okolie ponúka!
            </p>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import Navigation from "@/Components/Sidebar/Navigation.vue";

const isVisible = ref(false);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 200); // Small delay to trigger the CSS transition
});

const handleTransitionEnd = () => {
    // Handle any logic after the transition ends, if necessary
};
</script>

<style scoped>
/* Tailwind CSS utility classes already handle most of the responsive styles */
</style>
