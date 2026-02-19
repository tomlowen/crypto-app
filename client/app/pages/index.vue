<script setup lang="ts">

// Usage with full reactivity and SSR support
// const { data, status, error, refresh } = await useAPI('/coins');

const { data, refresh } = await useFetch('http://127.0.0.1:8000/api/v1/coins');

//   return useFetch(url, {
//     ...options,
//     $fetch: $api as typeof $fetch
//   })

</script>

<template>
    <div class="min-h-screen bg-gray-100 text-gray-800">
        <main class="container mx-auto px-4 py-10">
            <section class="text-center">
                <h2 class="text-4xl font-bold mb-4">Welcome to CryptoApp</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Track your favorite cryptocurrencies and stay updated with the latest trends.
                </p>
                <button class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                    Get Started
                </button>
            </section>

            <section class="mt-10">
                <h3 class="text-2xl font-bold mb-4">Top Cryptocurrencies</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg">
                        <h4 class="text-xl font-bold">Bitcoin</h4>
                        <p class="text-gray-600">Price: $50,000</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg">
                        <h4 class="text-xl font-bold">Ethereum</h4>
                        <p class="text-gray-600">Price: $3,500</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg">
                        <h4 class="text-xl font-bold">Cardano</h4>
                        <p class="text-gray-600">Price: $2.30</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<style>
/* Add any additional styles here if needed */
</style>