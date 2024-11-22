<template>
    <div class="fixed top-0 left-0 right-0">
        <div class="block h-14 w-full items-end px-4 py-2 bg-gray-200 shadow-md dark:bg-gray-700 dark:text-gray-300">
            <div class="flex items-end justify-between h-full">

                <div :class="{ 'md:ml-64': isExpanded, 'md:ml-16': !isExpanded, 'ml-0': true }"
                    class="md:flex items-center h-full overflow-hidden hidden ">
                    <div class="h-full flex items-center">
                        <img src="/images/logo.png" alt="" class="max-h-full w-auto object-contain">
                    </div>
                </div>

                <div class="flex h-full md:hidden">
                    <button @click="toggleSidebar" class="hover:bg-green-600 hover:text-white dark:hover:bg-gray-900">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="relative ml-auto" v-if="auth?.user">
                    <button @click="toggleDropdown" class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-blue-400 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-800 dark:text-gray-300 text-xl hidden md:block">{{ auth.user.name
                            }}</span>
                    </button>

                    <div v-if="isOpen"
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1">
                        <Link href="/logout" method="DELETE" as="button"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 hover:bg-gray-100">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <span>Logout</span>
                        </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal with transition -->
    <transition enter-active-class="transition-transform duration-300 ease-out" enter-from-class="-translate-x-full"
        enter-to-class="translate-x-0" leave-active-class="transition-transform duration-300 ease-in"
        leave-from-class="translate-x-0" leave-to-class="-translate-x-full">
        <div v-if="isSidebarOpen" class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 h-full shadow-lg z-50">
            <button @click="toggleSidebar" class="p-4 dark:text-gray-300">Fechar</button>
            <nav>
                <Link v-for="item in menuItems" :key="item.name" :href="item.href"
                    class="flex items-center rounded-lg px-2 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-900 dark:text-gray-300">
                <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                <span v-if="isExpanded" class="ml-3 transition-opacity duration-300 dark:text-gray-300">{{ item.name }}</span>
                </Link>
            </nav>
        </div>
    </transition>
</template>


<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { HomeIcon, AcademicCapIcon, UserGroupIcon, PencilIcon, ExclamationCircleIcon, NewspaperIcon, UserCircleIcon, CalendarIcon } from '@heroicons/vue/24/outline'

defineProps({
    auth: Object,
    isExpanded: Boolean
})

const isOpen = ref(false)
const isSidebarOpen = ref(false)
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value
}

const toggleDropdown = () => {
    isOpen.value = !isOpen.value
}
const menuItems = [
    { name: 'Dashboard', href: '/dashboard', icon: HomeIcon },
    { name: 'Turmas', href: '/turmas', icon: AcademicCapIcon },
    { name: 'Professores', href: '/professores', icon: UserGroupIcon },
    { name: 'Notas', href: '/notas', icon: PencilIcon },
    { name: 'Faltas', href: '/faltas', icon: ExclamationCircleIcon },
    { name: 'Relatórios', href: '/relatorios', icon: NewspaperIcon },
    { name: 'Perfil', href: '/perfil', icon: UserCircleIcon },
    { name: 'Calendário', href: '/calendario', icon: CalendarIcon },
    // { name: 'Configurações', href: '/configuracoes', icon: CogIcon },
]
</script>