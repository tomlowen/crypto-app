<script lang="ts" setup>
import type { Coin } from '~/types/index.d.ts';

const props = defineProps<{
    coin: Coin;
}>();

async function handleClick(): Promise<void> {
    await navigateTo(`/coins/${props.coin.coingecko_id}`);
}
</script>

<template>
    <tr class="hover:bg-gray-100 cursor-pointer" @click="handleClick">
        <td class="px-6 py-4 text-sm text-gray-800">{{coin.market_cap_rank}}</td>
        <td class="px-6 py-4 text-sm text-gray-800">{{coin.name}}</td>
        <td class="px-6 py-4 text-sm text-gray-800 text-right">£{{coin.current_price}}</td>
        <td 
            class="px-6 py-4 text-sm text-right" 
            :class="coin.price_change_percentage_24h ?? 0 < 0 ? 'text-red-600' : 'text-green-600'">
            {{coin.price_change_percentage_24h}}%
        </td>
    </tr>
</template>