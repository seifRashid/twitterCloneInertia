<script setup>
defineProps({
    flash: Object,
});
onMounted(() => {
    if (flash.success.value) {
        setTimeout(() => {
            flash.success.value = false;
        }, 3000); // Hide after 3 seconds
    }
});
</script>
<template>
    <div
        v-show="flash.success"
        class="bg-green-400 text-green-900 text-xl border border-green-600 p-4 w-full rounded-md"
    >
        {{ flash.success }}
        <p class="ml-5 cursor-pointer">X</p>
    </div>
</template>
