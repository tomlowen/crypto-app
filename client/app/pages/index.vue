<script setup lang="ts">
import CoinTableRow from '~/components/CoinTableRow.vue';
import { useAPI } from '~/composable/useAPI';
import type { Coin } from '~/types/index.d.ts';

//TODO: move this to a store and use it across the app
//TODO: add pagination
//TODO: add a refresh button to update the data
//TODO: add error handling and loading state
const res = await useAPI('/coins');
const data = res.data as Ref<{ data: Coin[] }>;

const filteredData = ref(data.value.data.slice(0,10) as Coin[]);

function handleSearch(query: string): void {
    var results: Coin[];

    if (!query) {
        results = data.value.data;
    } else {
        results = data.value.data.filter(coin => 
            coin.name.toLowerCase().includes(query.toLowerCase()) ||
            coin.symbol.toLowerCase().includes(query.toLowerCase())
        );
    }

    filteredData.value = results.slice(0,10)
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 text-gray-800">
        <main class="container mx-auto px-4 py-10">
            <section class="text-center">
                <h2 class="text-4xl font-bold mb-4">Welcome to CryptoApp</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Track your favorite cryptocurrencies and stay updated with the latest trends.
                </p>
                <Search @update:search="(value) => handleSearch(value)" />
            </section>

            <section class="mt-10">
                <h3 class="text-2xl font-bold mb-4">Top Cryptocurrencies</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead>
                            <tr class="bg-blue-600 text-white *: text-sm font-medium uppercase tracking-wider">
                                <th class="px-6 py-3 text-left">Rank</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-right">Price</th>
                                <th class="px-6 py-3 text-right">24h Change %</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <CoinTableRow v-for="coin in filteredData" :key="coin.id" :coin="coin" />
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</template>

<style>
/* Add any additional styles here if needed */
</style>