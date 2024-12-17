<script setup></script>
<template>
    <div class="flex flex-col border border-slate-400 rounded-md p-4">
        <form @submit.prevent="submit">
            <h1 class="font-semibold" >Search</h1>
            <input
                type="text"
                placeholder="Search user..."
                class="border border-gray-300 rounded-md w-full"
            />
            <button
                type="submit"
                class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-1 my-2 px-4 rounded"
            >
                Search
            </button>
        </form>
    </div>
    <div class="flex flex-col border border-slate-400 rounded-md p-4">
        <h1 class="font-semibold" >Who to follow</h1>
        <div class="flex justify-between py-1">
            <div class="flex flex-col cursor-pointer">
                <h1 class="text-sm" >My Name</h1>
                <p class="text-xs">@my-name</p>
            </div>
            <h1 class="cursor-pointer text-2xl" >+</h1>
        </div>
        <div class="flex justify-between py-1">
            <div class="flex flex-col cursor-pointer">
                <h1 class="text-sm" >Your Name</h1>
                <p class="text-xs">@your-name</p>
            </div>
            <h1 class="cursor-pointer text-2xl" >+</h1>
        </div>
    </div>
</template>
