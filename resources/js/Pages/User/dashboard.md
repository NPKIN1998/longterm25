<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Swal from 'sweetalert2';

const { props } = usePage();
const user = ref(props.user);
const referralLink = ref(props.referral_link);
let copied = ref(false);

const copyToClipboard = () => {
    const inputField = document.createElement('input');
    inputField.value = referralLink.value;
    document.body.appendChild(inputField);
    inputField.select();
    document.execCommand('copy');
    document.body.removeChild(inputField);
    copied.value = true;
    setTimeout(() => {
        copied.value = false;
    }, 1500);

    Swal.fire({
        icon: 'success',
        text: `Copied link: ${referralLink.value}`,
        showConfirmButton: false,
        timer: 1500
    });
};
const formatCurrency = (amount) => {
    return parseFloat(amount).toLocaleString('en-KE', { style: 'currency', currency: 'KES' });
};
const appName = import.meta.env.VITE_APP_NAME || 'Longterm 25'; 
</script>


<template>


    <AuthenticatedLayout>

        <Head title="Dashboard" />
        <div class="mx-4 sm:mx-auto sm:max-w-sm mt-4">
            <div
                class="w-full bg-white mb-3 mx-2 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                <span class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold text-white uppercase rounded-full"
                    :class="{ 'bg-green-500': user.status === 'active', 'bg-red-500': user.status !== 'active' }">
                    {{ user.status }}
                </span>
                <div class="flex flex-col items-center pb-10 mt-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                        {{ user.username }}
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ formatCurrency(user.balance) }}
                    </span>
                    <div class="flex mt-4 md:mt-6">
                        <Link :href="route('deposit')"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Deposit
                        </Link>
                        <Link :href="route('withdrawal')"
                            class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Withdraw
                        </Link>

                        <Link :href="route('product')"
                            class="inline-flex ms-2 items-center px-4 py-2 text-sm font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                        Asset
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-3">

                <div class="bg-white dark:bg-gray-800 mx-4 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-3xl mx-4">
                        <!-- <div
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                            <span
                                class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold text-white uppercase rounded-full"
                                :class="{ 'bg-green-500': user.status === 'active', 'bg-red-500': user.status !== 'active' }">
                                {{ user.status }}
                            </span>
                            <div class="flex flex-col items-center pb-10 mt-10">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie image" />
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ user.username }}
                                </h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ formatCurrency(user.balance) }}
                                </span>
                                <div class="flex mt-4 md:mt-6">
                                    <Link :href="route('deposit')"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Deposit
                                    </Link>
                                    <Link :href="route('withdrawal')"
                                        class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Withdraw
                                    </Link>

                                    <Link :href="route('product')"
                                        class="inline-flex ms-2 items-center px-4 py-2 text-sm font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                                        Asset
                                    </Link>
                                </div>
                            </div>
                        </div> -->

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4 mt-2">
                            <!-- User Investment Card -->
                            <div class="bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Investment</h3>
                                    <p class="text-2xl font-bold text-lime-600 dark:text-blue-400">{{
                                        formatCurrency(user.investment) }}</p>
                                </div>
                            </div>

                            <!-- User Upline Bonus Card -->
                            <div class="bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Upline Bonus</h3>
                                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{
                                        formatCurrency(user.uplinebonus) }}</p>
                                </div>
                            </div>

                            <!-- User Cashout Card -->
                            <div class="bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Cashout</h3>
                                    <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{
                                        formatCurrency(user.cashout) }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold">Status:</p>
                            <p>{{ user.status }}</p>
                        </div>
                    </div>
                </div>
                <form
                    class="flex justify-between ring-2 ring-blue-900 bg-purple-50 rounded-xl shadow overflow-hidden p-0.5 mx-4 my-2">
                    <input type="text" :value="referralLink"
                        class="flex-1 px-2 text-skin-secondary border-none outline-none focus:border-none focus:outline-none"
                        readonly>
                    <button :class="{ 'text-green-500': copied }" @click.prevent="copyToClipboard"
                        class="px-4 py-2 font-medium bg-skin-primary text-skin-inverted rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
