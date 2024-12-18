<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    content: null,
});

function submit() {
    router.post("/tweet", form);
    form.reset();
}

//define prop named error
const err = defineProps({
    errors: Object,
});

// if(this.err.errors.content){
//     this.form.content = null
// }

</script>
<template>
    <div class="flex flex-col bg-white p-4 rounded-lg shadow-md w-full">
        <h1 class="text-lg text-slate-600 font-semibold py-1">
            Share your ideas
        </h1>
        <form @submit.prevent="submit">
            <div class="flex flex-col gap-2">
                <textarea
                    type="text"
                    v-model="form.content"
                    placeholder="Your ideas matter,😁"
                    class="p -2 border border-gray-300 rounded-md w-full"
                />
            </div>
            <div v-if="err.errors.content">
                <p class="text-xs text-red-500 font-semibold">{{ err.errors.content }}</p>
            </div>
            <button
                type="submit"
                class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-1 my-2 px-4 rounded"
            >
                Share
            </button>
        </form>
    </div>
</template>
