export default defineNuxtPlugin((nuxtApp) => {  
    const api = $fetch.create({
        baseURL: useRuntimeConfig().public.apiBase ?? 'http://127.0.0.1:8000/api/v1',
    
        async onResponseError({ response }) {
            if (response.status !== 200) {
                // Handle global error (e.g., show notification, redirect to login, etc.)
                await navigateTo('/')
            }
        }
    })
  
    return {
        provide: {
            api
        }
    }
  })