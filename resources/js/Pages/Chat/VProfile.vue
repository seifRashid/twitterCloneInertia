<script setup>
import PostForm from "@/Components/ChatComponents/PostForm.vue";
import RightSide from "@/Components/ChatComponents/RightSide.vue";
import SideLinks from "@/Components/ChatComponents/SideLinks.vue";
import VPagination from "@/Components/ChatComponents/VPagination.vue";
import VPost from "@/Components/ChatComponents/VPost.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const user = usePage().props.auth.user;
const form = useForm({
    user_id: user.id,
    bio: "",
    profileImage: "",
});
console.log(user.id);
const previewImage = ref(null);
const showProfileOnScreen = ref(false);
const editProfile = ref(false);

function uploadProfilePicture(event) {
    const file = event.target.files[0];
    if (file) {
        form.profileImage = file;

        // Create a preview URL
        previewImage.value = URL.createObjectURL(file);
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-[80%] mx-auto">
            <div
                class="relative flex gap-2 items-start justify-center w-full pt-4"
            >
                <!--  Side Links  -->
                <div
                    v-show="showProfileOnScreen"
                    class="absolute flex flex-col items-center justify-center left-0 top-0 w-full h-full"
                >
                    <img
                        v-if="previewImage"
                        :src="previewImage"
                        alt="Profile Picture Preview"
                        class="w-[400px] h-auto object-cover rounded-md text-2xl flex justify-center items-center"
                    />
                    <div @click="showProfileOnScreen = false" class="cursor-pointer bg-green-900 px-2 text-sm font-semibold text-green-100 rounded-md my-2" title="click to get back to profile" >Out</div>
                </div>
                <SideLinks />
                <div class="w-2/4">
                    <div class="flex flex-col gap-4">
                        <div
                            class="flex flex-col gap-2 pb-3 justify-start items-center"
                        >
                            <!-- Profile content section  -->
                            <!-- Create a profile section for the user -->
                            <div>
                                <!-- Show image on fly after file has been selected -->
                                <img
                                    @click="showProfileOnScreen = true"
                                    v-if="previewImage"
                                    :src="previewImage"
                                    alt="Profile Picture Preview"
                                    class="cursor-pointer size-32 rounded-full object-cover text-2xl flex justify-center items-center"
                                />
                                <!-- Show image database after file has been uploaded -->
                                <img
                                    v-else-if="user.profile_picture"
                                    :src="`/storage/${user.profile_picture}`"
                                    alt="Current Profile Picture"
                                    class="w-24 h-24 rounded-full mb-4"
                                />
                                <!-- Show an empty circle with the user name inside it if no image is available -->
                                <div
                                    v-else
                                    class="size-32 rounded-full object-cover border border-green-600 text-2xl flex justify-center items-center"
                                >
                                    {{ user.id }}
                                </div>
                            </div>
                            <div class="text-lg font-bold">
                                {{ user.name }}
                                <!-- {{ usePage().auth.user.id }} -->
                            </div>
                            <div class="text-lg font-bold">
                                {{ user.email }}
                            </div>
                        </div>
                        <div class="w-full">
                            <div
                                @click="editProfile = !editProfile"
                                class="flex gap-2 items-center justify-center cursor-pointer bg-gray-200 hover:bg-gray-300 hover:border hover:border-gray-400 w-[132px] px-2 py-1 rounded-md"
                            >
                                <p class="text-sm font-semibold">
                                    Edit Profile
                                </p>
                                <svg
                                    class="size-6"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g
                                        id="SVGRepo_bgCarrier"
                                        stroke-width="0"
                                    ></g>
                                    <g
                                        id="SVGRepo_tracerCarrier"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M13 21H21"
                                            stroke="#323232"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                        <path
                                            d="M20.0651 7.39423L7.09967 20.4114C6.72438 20.7882 6.21446 21 5.68265 21H4.00383C3.44943 21 3 20.5466 3 19.9922V18.2987C3 17.7696 3.20962 17.2621 3.58297 16.8873L16.5517 3.86681C19.5632 1.34721 22.5747 4.87462 20.0651 7.39423Z"
                                            stroke="#323232"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                        <path
                                            d="M15.3096 5.30981L18.7273 8.72755"
                                            stroke="#323232"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                        <path
                                            opacity="0.1"
                                            d="M18.556 8.90942L7.09967 20.4114C6.72438 20.7882 6.21446 21 5.68265 21H4.00383C3.44943 21 3 20.5466 3 19.9922V18.2987C3 17.7696 3.20962 17.2621 3.58297 16.8873L15.0647 5.35974C15.0742 5.4062 15.0969 5.45049 15.1329 5.48653L18.5506 8.90426C18.5524 8.90601 18.5542 8.90773 18.556 8.90942Z"
                                            fill="#323232"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div v-if="editProfile" class="flex p-4 bg-gray-200">
                            <div class="flex flex-col gap-1 w-full">
                                <p class="font-bold mb-4">
                                    Edit Bio and profile picture
                                </p>
                                <form
                                    @submit.prevent="
                                        form.patch(route('profile.update')),
                                            form.reset(),
                                            (editProfile = false),
                                            (previewImage.value = null)
                                    "
                                    class="w-full space-y-2"
                                >
                                    <div
                                        class="flex items-start justify-between w-full"
                                    >
                                        <label
                                            for="profileImage"
                                            class="font-semibold text-sm w-[120px]"
                                            >Profile Photo:</label
                                        >
                                        <input
                                            type="file"
                                            id="profileImage"
                                            @change="uploadProfilePicture"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                                        />
                                        <!-- form errors -->
                                        <!-- <div
                                         v-if="form.errors.has('profileImage')"
                                         class="text-red-500 text-sm"
                                         >
                                         {{ form.errors.get('profileImage') }}
                                        </div> -->
                                    </div>
                                    <div
                                        class="flex items-start justify-between w-full"
                                    >
                                        <label
                                            for="bio"
                                            class="font-semibold text-sm w-[120px]"
                                            >Bio:</label
                                        >
                                        <textarea
                                            v-model="bio"
                                            class="w-full h-20 p-2 border border-gray-300 rounded-md"
                                            placeholder="Tell us about yourself"
                                        />
                                    </div>
                                    <!-- submit button -->
                                    <button
                                        class="py-1 px-2 bg-green-300 font-semibold rounded-md"
                                        type="submit"
                                    >
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div v-else class="flex p-4 bg-gray-200">
                            <p class="font-semibold pr-1">Bio:</p>
                            <p v-if="user.bio">{{ user.bio }}</p>
                            <p v-else>Bio is empty😁{{ user.bio }}</p>
                        </div>
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
