<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    jina: Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-[80%] mx-auto">
            <h1 class="text-slate-600 font-semibold text-2xl text-center" >Terms and Conditons</h1>
            <p>
                <span class="text-red-600 font-semibold text-xl" >Lorem ipsum</span>, dolor sit amet consectetur adipisicing elit. Rerum
                iste cupiditate, pariatur inventore praesentium quod doloribus sunt voluptatibus iusto debitis atque
                beatae! Blanditiis magnam <span class="text-green-600 font-semibold text-xl" >minima nobis</span> expedita repellendus
                eligendi dolores.dolor sit amet consectetur adipisicing elit. Rerum iste cupiditate,
                pariatur inventore praesentium quod doloribus sunt voluptatibus iusto debitis atque
            </p>
        </div>
    </AuthenticatedLayout>
</template>

<!-- <h1 class="text-2xl">Welcome to homee page</h1>
<div v-for="mtu in jina" :key="mtu.id">
    <div class="flex items-center gap-6">
        <div class="m-3">
        <h2 class="font-bold text-red-600">{{ mtu.name }}</h2>
        <h2 class="font-semibold text-green-600">{{ mtu.age }}</h2>
        <h2 class="font-semibold">{{ mtu.role }}</h2>
        <hr>
    </div>
    <div v-if="mtu.age >= 30" class="border-l-8 border-green-600 px-2"> Wewe ni mzee👴</div>
    <div v-else class="border-l-8 border-green-600 px-2"> Wewe ni mdogo👶</div>
    </div>
</div> -->
