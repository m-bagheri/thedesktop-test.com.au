<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 mx-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
                <router-link :to="{ name: 'books.create' }" class="text-sm font-medium">Create book</router-link>
            </div>
            <div class="px-4 py-2 mx-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
              <router-link :to="{ name: 'authors.create' }" class="text-sm font-medium">Create author</router-link>
            </div>
            <div class="px-4 py-2 mx-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
              <router-link :to="{ name: 'authors.index' }" class="text-sm font-medium">View authors</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Title</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Category</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                      <span
                          class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Author</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">ISBN</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in books" :key="item.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.title }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.category }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                          {{ item.author.full_name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.isbn }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-right">
                            <router-link :to="{ name: 'books.edit', params: { id: item.id } }"
                                         class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </router-link>
                            <button @click="deleteBook(item.id)"
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
import useBooks from "@/composables/books";
import { onMounted } from "vue";

const { books, getBooks, destroyBook } = useBooks()
onMounted(getBooks)
const deleteBook = async (id) => {
    if (!window.confirm('Are you sure?')) {
        return
    }
    await destroyBook(id);
    await getBooks();
}
</script>
