<script setup>
import RightSide from "@/Components/ChatComponents/RightSide.vue";
import SideLinks from "@/Components/ChatComponents/SideLinks.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    jina: Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-[80%] mx-auto">
            <div class="flex gap-2 items-start justify-center w-full pt-4">
                <SideLinks />
                <div class="w-2/4">
                        <h1
                            class="text-slate-600 font-semibold text-2xl text-center"
                        >
                            Terms and Conditons
                        </h1>
                        <p>
                            <span class="text-red-600 font-semibold text-xl "
                                >Lorem ipsum</span
                            >, dolor sit amet consectetur adipisicing elit.
                            Rerum iste cupiditate, pariatur inventore
                            praesentium quod doloribus sunt voluptatibus iusto
                            debitis atque beatae! Blanditiis magnam
                            <span class="text-green-600 font-semibold text-xl"
                                >minima nobis</span
                            >
                            expedita repellendus eligendi dolores.dolor sit amet
                            consectetur adipisicing elit. Rerum iste cupiditate,
                            pariatur inventore praesentium quod doloribus sunt
                            voluptatibus iusto debitis atque
                        </p>
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
