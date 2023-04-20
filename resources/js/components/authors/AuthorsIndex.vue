<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
                <router-link :to="{ name: 'authors.create' }" class="text-sm font-medium">Create author</router-link>
            </div>
            <div class="px-4 py-2 mx-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
              <router-link :to="{ name: 'books.index' }" class="text-sm font-medium">View books</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">First name</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Last name</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Country</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                      <span
                          class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">E-mail</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                      <span
                          class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Last Updated</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="author in authors" :key="author.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ author.first_name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ author.last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ author.country }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                          {{ author.email }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                          {{ author.updated_at }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-right">
                            <router-link :to="{ name: 'authors.edit', params: { id: author.id } }"
                                         class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </router-link>
                            <button @click="deleteAuthor(author.id)"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import useAuthors from "@/composables/authors";
import { onMounted } from "vue";

const { authors, getAuthors, destroyAuthor } = useAuthors()
onMounted(getAuthors)
const deleteAuthor = async (id) => {
    if (!window.confirm('Are you sure?')) {
        return
    }
    await destroyAuthor(id);
    await getAuthors();
}
</script>
