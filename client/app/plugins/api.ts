export default defineNuxtPlugin((nuxtApp) => {  
    const api = $fetch.create({
        baseURL: useRuntimeConfig().public.apiBase,
    
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