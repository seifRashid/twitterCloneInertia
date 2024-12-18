<script setup>
import { reactive, ref } from "vue";
import { router } from "@inertiajs/vue3";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

defineProps({
    post: Array,
});

const showSetting = ref(false)

const form = reactive({
    idea: null,
});

function submit() {
    router.post("/comment", form);
}

const commentShow = ref(false);
</script>
<template>
    <div
        class="flex flex-col gap-2 p-4 items-start border border-slate-400 rounded-md shadow-md"
    >
        <div class="flex justify-between items-center w-full">
            <div class="flex justify-start items-center gap-2">
                <div
                    class="size-[45px] rounded-full bg-green-400 text-2xl items-center"
                ></div>
                <div class="font-bold text-slate-800">{{ post.id }}</div>
            </div>
            <div class="flex justify-between gap-3 items-center">
                <div class="text-sm text-slate-800">
                    {{ dayjs(post.created_at).fromNow() }}
                </div>
                <!-- Post settings -->
                <div class="flex flex-col relative">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 cursor-pointer"
                    @click="showSetting = !showSetting"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"
                    />
                </svg>
                <transition name="fade-slide" >
                    <div v-show="showSetting" class="absolute top-5 right-2 border border-slate-600 bg-white rounded-md py-1 text-sm">
                        <div class="flex flex-col gap-1">
                            <div class="text-sm text-red-800 font-semibold cursor-pointer hover:bg-slate-300 px-3 w-full">Delete</div>
                            <div class="text-sm text-green-800 font-semibold cursor-pointer hover:bg-slate-300 px-3 w-full">Edit</div>
                        </div>
                    </div>
                </transition>
                </div>
            </div>
        </div>
        <!-- Content -->
        <p class="text-sm text-slate-800">
            {{ post.content }}
        </p>
        <!-- Reactions Icons -->
        <div class="flex gap-2 items-center justify-between w-full my-2">
            <!-- Like icon -->
            <div
                class="flex gap-[1px] items-center cursor-pointer"
                title="Like this post 😁"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-5 text-slate-500 hover:text-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                    />
                </svg>
                <span class="text-slate-500 text-xs">{{ post.likes }}</span>
            </div>
            <!-- Comment icon -->
            <div
                class="cursor-pointer"
                @click="commentShow = !commentShow"
                title="Comment this post 💌"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-5 text-slate-500 hover:text-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                    />
                </svg>
            </div>
            <!-- Share icon -->
            <div class="cursor-pointer" title="Share this post ✈">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-5 text-slate-500 hover:text-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                    />
                </svg>
            </div>
            <!-- retweet -->
            <div class="cursor-pointer" title="retweet this post">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-5 text-slate-500 hover:text-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"
                    />
                </svg>
            </div>
            <!-- Bookmark -->
            <div class="cursor-pointer" title="Bookmark this post">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-5 text-slate-500 hover:text-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"
                    />
                </svg>
            </div>
        </div>
        <transition name="fade-slide" mode="out-in" appear>
            <div class="w-full" v-show="commentShow">
                <!-- Comment section -->
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
                        <div class="font-bold text-slate-800">
                            Mimi Mwenyewe
                        </div>
                    </div>
                    <p class="text-sm text-slate-800">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Animi quos quod assumenda dolorem soluta. Odio, enim
                        sapiente! Nesciunt quis porro aperiam vitae nulla quas,
                        omnis dolor, dolore itaque quam molestiae?
                    </p>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.fade-slide-enter-active,
.fade-slide-leave-active {
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.fade-slide-enter-from,
.fade-slide-leave-to {
    opacity: 0;
    transform: translateY(30px);
}

.fade-slide-enter-to,
.fade-slide-leave-from {
    opacity: 1;
    transform: translateY(0);
}
</style>
