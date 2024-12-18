<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>
<template>
    <div class="flex gap-4 justify-center px-2 py-1 border border-gray-500 rounded-md mb-2">
        <div v-for="(link, index) in links" :key="index" class="">
            <div v-if="link.url === null" v-html="link.label" class="text-gray-400" ></div>
            <Link
                v-else
                class="flex gap-2"
                :class="{
                    'bg-blue-500 text-white px-3 rounded-md': link.active,
                    'cursor-not-allowed opacity-50': !link.url,
                }"
                :href="link.url"
            >
                <span v-html="link.label"></span>
            </Link>
        </div>
    </div>
</template>
