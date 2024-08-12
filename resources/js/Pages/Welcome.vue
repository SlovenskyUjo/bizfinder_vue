<template>
    <main class="w-full h-screen flex flex-row relative">
        <Navigation />
        <section class="flex flex-col p-10 ml-20 w-full gap-5">
          <Home />
        </section>
    </main>
</template>
<script setup lang="ts">
import Navigation from "@/Components/Sidebar/Navigation.vue";
import Home from "@/Components/Main/Home.vue";
</script>
