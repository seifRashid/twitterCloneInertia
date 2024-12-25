<script setup>
function submit() {
    router.put("/tweet", form);
    form.reset();
}
</script>
<template>
    <form @submit.prevent="submit">
        <div class="flex flex-col gap-2">
            <textarea
                type="text"
                v-model="form.idea"
                placeholder="Comment..."
                class="p -2 border border-gray-300 rounded-md w-full"
            />
        </div>
        <button
            type="submit"
            class="bg-slate-600 hover:bg-slate-500 text-white text-sm font-bold py-1 my-2 px-4 rounded"
        >
            Comment
        </button>
    </form>
    <div class="w-full flex flex-col gap-2 p-4">
        <div class="flex justify-start items-center gap-2">
            <div
                class="size-[35px] rounded-full bg-green-400 text-2xl items-center"
            ></div>
            <div class="font-bold text-slate-800">Mimi Mwenyewe</div>
        </div>
        <p class="text-sm text-slate-800">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quos
            quod assumenda dolorem soluta. Odio, enim sapiente! Nesciunt quis
            porro aperiam vitae nulla quas, omnis dolor, dolore itaque quam
            molestiae?
        </p>
    </div>
</template>
