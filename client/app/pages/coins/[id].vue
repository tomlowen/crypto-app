<script lang="ts" setup>
import type { Coin } from '~/types';

const res = await useFetch('http://127.0.0.1:8000/api/v1/coins/' + useRoute().params.id);
const data = res.data as Ref<{ data: Coin }>;
</script>

<template>
    <div class="min-h-screen bg-gray-100 text-gray-800">
        <div class="container mx-auto py-10 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center space-x-4">
                    <img :src="data.data.image_url" alt="Coin Logo" class="w-16 h-16 rounded-full" />
                    <div>
                        <h1 class="text-2xl font-bold">{{ data.data.name }}</h1>
                        <p class="text-gray-500">{{ data.data.symbol.toUpperCase() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-lg">
                        Current Price: <span class="font-semibold">${{ data.data.current_price }}</span>
                    </p>
                    <p class="text-lg">
                        Market Cap: <span class="font-semibold">${{ data.data.market_cap.toLocaleString() }}</span>
                    </p>
                    <p class="text-lg" v-if="data.data.price_change_percentage_24h !== null">
                        24h Change: 
                        <span 
                            :class="data.data.price_change_percentage_24h >= 0 ? 'text-green-500' : 'text-red-500'"
                        >
                            {{ data.data.price_change_percentage_24h.toFixed(2) }}%
                        </span>
                    </p>

                    <p v-if="data.data.description" class="mt-4 text-gray-700">
                        {{ data.data.description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>