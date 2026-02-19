<script lang="ts" setup>

defineEmits(["update:search"]);

const searchText = ref("");
</script>

<template>
    <div class="w-full max-w-md mx-auto">
        <input
            type="text"
            v-model="searchText"
            @input="$emit('update:search', searchText)"
            placeholder="Search..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    </div>
</template>

<style scoped>
/* Add any additional styles here if needed */
</style>