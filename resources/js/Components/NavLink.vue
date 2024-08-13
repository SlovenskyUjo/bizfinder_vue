<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-3 py-2 border-b-2 border-[#60EFFF] text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-[#0061FF] transition duration-150 ease-in-out transform scale-105 shadow-md'
        : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:border-[#0061FF] focus:outline-none focus:border-[#0061FF] transition duration-150 ease-in-out transform hover:scale-105'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
