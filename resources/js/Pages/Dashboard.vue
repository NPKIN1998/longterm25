<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Swal from 'sweetalert2';

const { props } = usePage();
const user = ref(props.user);
const referralLink = ref(props.referral_link);
const copied = ref(false);

const copyToClipboard = () => {
    navigator.clipboard.writeText(referralLink.value)
        .then(() => {
            copied.value = true;
            Swal.fire({
                icon: 'success',
                text: `Copied link: ${referralLink.value}`,
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch((error) => {
            console.error('Unable to copy to clipboard: ', error);
            Swal.fire({
                icon: 'error',
                text: 'Unable to copy to clipboard',
                showConfirmButton: false,
                timer: 1500
            });
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

        <div class="container mx-4 mx-auto mt-4">
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3 mt-2 mx-4">
                <!-- User Deposit Card -->
                <div
                    class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1 bg-gradient-to-br from-blue-400 to-blue-600 dark:from-blue-400 dark:to-blue-600 rounded-xl overflow-hidden shadow-lg relative">
                    <div class="p-6">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white dark:text-gray-200 mb-4">
                            Total Deposit
                        </h3>
                        <div class="flex items-center justify-between">
                            <p class="text-xl md:text-2xl lg:text-3xl font-bold text-white dark:text-gray-200">
                                {{ formatCurrency(user.deposit) }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-12 h-12 text-white dark:text-gray-200">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 0 1 .832.445l4.5 6a1 1 0 0 1 .168.805l-.626 2.5a1 1 0 0 1-1.225.68l-6-1a1 1 0 0 1-.544-.322l-4-4a1 1 0 1 1 1.32-1.486l3.347 3.348 5.348-2.676-2.675-5.35-4.442 4.442a1 1 0 1 1-1.414-1.415l6-6A1 1 0 0 1 10 3zm8 10a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 2 0v2h2a1 1 0 0 1 0 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <a :href="route('deposit')"
                                class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold bg-lime-700 text-white uppercase rounded-full">
                                View all
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Investment Card -->
                <div
                    class="col-span-1 bg-gradient-to-br from-green-400 to-green-600 dark:from-blue-400 dark:to-blue-600 rounded-xl overflow-hidden shadow-lg relative">
                    <div class="p-6">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white dark:text-gray-200 mb-4">
                            Total running Investment</h3>
                        <div class="flex items-center justify-between">
                            <p class="text-xl md:text-2xl lg:text-3xl font-bold text-white dark:text-gray-200">
                                {{ formatCurrency(user.investment) }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-12 h-12 text-white dark:text-gray-200">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 0 1 .832.445l4.5 6a1 1 0 0 1 .168.805l-.626 2.5a1 1 0 0 1-1.225.68l-6-1a1 1 0 0 1-.544-.322l-4-4a1 1 0 1 1 1.32-1.486l3.347 3.348 5.348-2.676-2.675-5.35-4.442 4.442a1 1 0 1 1-1.414-1.415l6-6A1 1 0 0 1 10 3zm8 10a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 2 0v2h2a1 1 0 0 1 0 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <a :href="route('withdrawal')"
                                class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold bg-blue-700 text-white uppercase rounded-full">
                                View all
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Cashout Card -->
                <div
                    class="col-span-1 bg-gradient-to-br from-red-400 to-red-600 dark:from-red-600 dark:to-red-800 rounded-xl overflow-hidden shadow-lg relative">
                    <div class="p-6">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white dark:text-gray-200 mb-4">
                            Total Cashout</h3>
                        <div class="flex items-center justify-between">
                            <p class="text-xl md:text-2xl lg:text-3xl font-bold text-white dark:text-gray-200">
                                {{ formatCurrency(user.cashout) }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white dark:text-gray-200"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6.293 3.707a1 1 0 0 1 1.414 0L10 6.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 8l2.293 2.293a1 1 0 0 1-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 8 6.293 5.707a1 1 0 0 1 0-1.414zm7.414 11.586a1 1 0 0 1-1.414 0L10 13.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 12 6.293 9.707a1 1 0 1 1 1.414-1.414L10 10.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 12l2.293 2.293a1 1 0 0 1 0 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <a :href="route('withdrawal')"
                                class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold bg-blue-700 text-white uppercase rounded-full">
                                View all
                            </a>
                        </div>
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


        <div
            class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                <Link :href="route('dashboard')"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </Link>
                <button data-tooltip-target="tooltip-home" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </button>
                <div id="tooltip-home" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Home
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-wallet" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                        <path
                            d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                    </svg>
                    <span class="sr-only">Wallet</span>
                </button>
                <div id="tooltip-wallet" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Wallet
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-new" type="button"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                        <span class="sr-only">New item</span>
                    </button>
                </div>
                <div id="tooltip-new" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Create new item
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-settings" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                    </svg>
                    <span class="sr-only">Settings</span>
                </button>
                <div id="tooltip-settings" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Settings
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-profile" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    <span class="sr-only">Profile</span>
                </button>
                <div id="tooltip-profile" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
