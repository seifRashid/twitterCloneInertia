<script setup>
import PostForm from "@/Components/ChatComponents/PostForm.vue";
import RightSide from "@/Components/ChatComponents/RightSide.vue";
import SideLinks from "@/Components/ChatComponents/SideLinks.vue";
import VPost from "@/Components/ChatComponents/VPost.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    posts: Array,
});
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
                        <!-- Post form -->
                        <PostForm />
                        <!-- TimeLine-->
                        <div class="flex flex-col gap-4 pb-3">
                            <!-- Posts  -->
                             <div v-for="post in posts" :key="post.id">
                                <VPost :post="post" />
                             </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/4">
                    <div class="flex flex-col gap-4">
                        <RightSide/>
                    </div>

                </div>
            </div>
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
