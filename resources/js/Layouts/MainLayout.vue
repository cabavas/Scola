<template>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-800">
      <div class="hidden md:block">
        <Aside />
      </div>
      <Header :auth="$page.props.auth" :is-expanded="isExpanded" />
      <main class="flex-1 overflow-x-hidden overflow-y-auto transition-margin duration-300 mt-14" :class="{ 'md:ml-64': isExpanded, 'md:ml-16': !isExpanded, 'ml-0': true}">
        <slot></slot>
      </main>
    </div>
  </template>
  
  <script setup>
  import Aside from '@/Layouts/Aside.vue'
  import Header from '@/Layouts/Header.vue'
  import { provide, ref } from 'vue'
  
  const isExpanded = ref(true)
  provide('isExpanded', isExpanded)
  </script>
  