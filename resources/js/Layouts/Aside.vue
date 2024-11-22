<template>
  <aside :class="[
        'fixed left-0 top-0 z-40 h-screen transition-width duration-300',
        isExpanded ? 'w-64' : 'w-16'
      ]" class="bg-gray-200 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
    <div class="flex h-full flex-col">
      <!-- Toggle Button -->
      <button @click="toggleSidebar" class="p-4 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-900">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Navigation Items -->
      <nav class="flex-1 space-y-1 px-2 py-4">
        <Link v-for="item in menuItems" :key="item.name" :href="item.href"
          class="flex items-center rounded-lg px-2 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-900">
        <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
        <span v-if="isExpanded" class="ml-3 transition-opacity duration-300">{{ item.name }}</span>
        </Link>
      </nav>
    </div>
  </aside>
</template>
  
  <script setup>
  import { inject } from 'vue'
  import { Link } from '@inertiajs/vue3'
  import { HomeIcon, CogIcon, UserCircleIcon, AcademicCapIcon, UserGroupIcon, PencilIcon, CalendarIcon, ExclamationCircleIcon, NewspaperIcon } from '@heroicons/vue/24/outline'
  
  const isExpanded = inject('isExpanded')
  
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
  
  const toggleSidebar = () => {
    isExpanded.value = !isExpanded.value
  }
  </script>
  
  <style scoped>
  .transition-width {
    transition-property: width;
  }
  </style>
  