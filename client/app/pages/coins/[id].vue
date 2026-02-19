<template>
    <div class="min-h-screen bg-gray-100 text-gray-800">
        <div class="container mx-auto py-10 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center space-x-4">
                    <img :src="coin.image" alt="Coin Logo" class="w-16 h-16 rounded-full" />
                    <div>
                        <h1 class="text-2xl font-bold">{{ coin.name }}</h1>
                        <p class="text-gray-500">{{ coin.symbol.toUpperCase() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-lg">
                        Current Price: <span class="font-semibold">${{ coin.current_price }}</span>
                    </p>
                    <p class="text-lg">
                        Market Cap: <span class="font-semibold">${{ coin.market_cap.toLocaleString() }}</span>
                    </p>
                    <p class="text-lg">
                        24h Change: 
                        <span 
                            :class="coin.price_change_percentage_24h >= 0 ? 'text-green-500' : 'text-red-500'"
                        >
                            {{ coin.price_change_percentage_24h.toFixed(2) }}%
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";

export default {
    name: "CoinDetails",
    setup() {
        const route = useRoute();
        const coin = ref(null);

        const fetchCoin = async () => {
            const id = route.params.id;
            try {
                const response = await fetch(
                    `https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${id}`
                );
                const data = await response.json();
                coin.value = data[0];
            } catch (error) {
                console.error("Error fetching coin data:", error);
            }
        };

        onMounted(fetchCoin);

        return { coin };
    },
};
</script>

<style>
/* Add any additional styles if needed */
</style>