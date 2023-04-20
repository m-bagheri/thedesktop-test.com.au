<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveAuthor">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <div class="mt-1">
                    <input type="text" name="first_name" id="first_name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.first_name">
                </div>
            </div>

          <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
            <div class="mt-1">
              <input type="text" name="last_name" id="last_name"
                     class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                     v-model="form.last_name">
            </div>
          </div>

          <div>
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <div class="mt-1">
              <input type="text" name="country" id="country"
                     class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                     v-model="form.country">
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <div class="mt-1">
              <input type="text" name="email" id="email"
                     class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                     v-model="form.email">
            </div>
          </div>

        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>

<script setup>
import {onMounted, reactive} from "vue";
import useAuthors from "@/composables/authors";

let form = reactive({
    'first_name': '',
    'last_name': '',
    'country': '',
    'email': '',
})
const { errors, storeAuthor } = useAuthors()
const saveAuthor = async () => {
    await storeAuthor({ ...form });
}
</script>
