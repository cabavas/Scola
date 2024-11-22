<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-xl w-full md:w-1/3">
            <form @submit.prevent="login">
                <div class="w-full">

                    <div class="w-1/3 mx-auto">
                        <img src="/images/logo.png" alt="">
                    </div>     

                    <div class="mt-4">
                        <h3 class="text-center font-bold text-2xl dark:text-gray-300">Scola: O futuro da sua escola começa aqui.</h3>
                    </div>

                    <div class="mt-4">
                        <label for="login" class="label">Login</label>
                        <input type="text" id="login" class="input" v-model="form.login" />
                        <div class="input-error" v-if="form.errors.login">{{ form.errors.login }}</div>
                    </div>

                    <div class="mt-4">
                        <label for="password" class="label">Senha</label>
                        <input type="password" id="password" class="input" v-model="form.password" />
                        <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
                    </div>

                    <div class="mt-8">
                        <button class="btn-primary w-full" type="submit">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    login: null,
    password: null
})
const login = () => form.post(route('login.store'))
</script>