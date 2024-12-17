<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div
        class="w-1/4 flex flex-col gap-4 p-4 items-start border border-slate-400 rounded-md"
    >
        <div class="hover:text-slate-600">
            <Link :href="route('dashboard')"> Home </Link>
        </div>
        <div class="hover:text-slate-600">
            <Link :href="route('home')"> Explore </Link>
        </div>
        <div class="hover:text-slate-600">
            <Link :href="route('home')"> Feed </Link>
        </div>
        <div class="hover:text-slate-600">
            <Link :href="route('terms')"> Terms </Link>
        </div>
        <div
            class="hover:text-slate-600 border-t border-slate-400 text-center w-full pt-3"
        >
            <Link :href="route('terms')"> View Pages </Link>
        </div>
    </div>
</template>
