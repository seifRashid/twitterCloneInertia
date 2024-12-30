<script setup>
import PostForm from "@/Components/ChatComponents/PostForm.vue";
import RightSide from "@/Components/ChatComponents/RightSide.vue";
import SideLinks from "@/Components/ChatComponents/SideLinks.vue";
import VPagination from "@/Components/ChatComponents/VPagination.vue";
import VPost from "@/Components/ChatComponents/VPost.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { comment } from "postcss";
import { TransitionGroup } from "vue";

// const { props } = usePage();
// const flash = props.flash;

defineProps({
    posts: Object,
    flash: Object,
    // form errors
    errors: Object,
    comments: Object,
});

// if(this.flash.success === true){
//     setTimeout(() => {
//         this.flash.success = false;
//     }, 3000);
// }
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-[80%] mx-auto">
            <div class="flex gap-2 items-start justify-center w-full pt-4">
                <!--  Side Links  -->
                <SideLinks />
                <div class="w-2/4">
                    <div class="flex flex-col gap-4">
                        <div
                            v-show="flash.success"
                            class="flex justify-between bg-green-400 text-green-900 text-lg border border-green-600 p-3 w-full rounded-md"
                        >
                            <div class="font-bold">
                                {{ flash.success }}
                            </div>
                            <p
                                class="ml-5 cursor-pointer font-bold"
                                @click="flash.success = false"
                            >
                                X
                            </p>
                        </div>
                        <!-- Post form -->
                        <PostForm :errors="errors" />
                        <!-- TimeLine-->
                        <div class="flex flex-col gap-4 pb-3">
                                <TransitionGroup name="list" tag="ul">
                                <!-- Posts  -->
                                <div v-for="post in posts.data" :key="post.id" class="pb-3" >
                                    <VPost :post="post" :comments="comments" />
                                    <!-- {{ comments }} -->
                                </div>
                            </TransitionGroup>
                            </div>
                        <VPagination :links="posts.links" />
                    </div>
                </div>
                <div class="w-1/4">
                    <div class="flex flex-col gap-4">
                        <RightSide />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style scoped>
.list-enter-active,
.list-leave-active {
    transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>
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
