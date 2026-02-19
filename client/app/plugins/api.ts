export default defineNuxtPlugin((nuxtApp) => {
    const config = useRuntimeConfig();
    
    const api = $fetch.create({
        baseURL: config.public.apiBase,
    
        async onResponseError({ response }) {
            if (response.status !== 200) {
                // Handle global error (e.g., show notification, redirect to login, etc.)
                await navigateTo('/login')
            }
        }
    })
  
    return {
        provide: {
            api
        }
    }
  })