<script setup>
import { ref } from 'vue'

const isMenuOpen = ref(false)
const navigation = [
  { name: 'Dashboard', href: '#' },
  { name: 'Team', href: '#' },
  { name: 'Projects', href: '#' },
  { name: 'Reports', href: '#' },
]
</script>

<template>
  <div class="flex flex-col min-h-screen bg-gray-50 font-sans text-gray-900">
    
    <header class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-gray-200">
      <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          
          <div class="flex-shrink-0 flex items-center gap-2">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-xl">V</span>
            </div>
            <span class="font-bold text-xl tracking-tight">VueApp</span>
          </div>

          <div class="hidden md:flex space-x-8">
            <a v-for="item in navigation" :key="item.name" :href="item.href" 
               class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">
              {{ item.name }}
            </a>
          </div>

          <div class="hidden md:block">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-indigo-700 transition-all shadow-sm">
              Get Started
            </button>
          </div>

          <div class="md:hidden">
            <button @click="isMenuOpen = !isMenuOpen" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
              <span class="sr-only">Open menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </nav>

      <div v-show="isMenuOpen" class="md:hidden bg-white border-b border-gray-200 px-4 pt-2 pb-6 space-y-1">
        <a v-for="item in navigation" :key="item.name" :href="item.href" 
           class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-md">
          {{ item.name }}
        </a>
      </div>
    </header>

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 min-h-[60vh]">
        <slot />
      </div>
    </main>

    <footer class="bg-white border-t border-gray-200 mt-auto">
      <div class="container mx-auto px-4 py-8 md:flex md:items-center md:justify-between">
        <div class="flex justify-center space-x-6 md:order-2">
          <a href="#" class="text-gray-400 hover:text-gray-500 text-sm">Privacy Policy</a>
          <a href="#" class="text-gray-400 hover:text-gray-500 text-sm">Terms of Service</a>
          <a href="#" class="text-gray-400 hover:text-gray-500 text-sm">Contact</a>
        </div>
        <div class="mt-8 md:mt-0 md:order-1 text-center md:text-left">
          <p class="text-sm text-gray-500">&copy; 2026 VueApp Inc. All rights reserved.</p>
        </div>
      </div>
    </footer>

  </div>
</template>