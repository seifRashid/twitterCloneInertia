<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="text-sm font-semibold cursor-pointer hover:bg-slate-300 px-3 w-full"    >
        <slot />
    </Link>
</template>
