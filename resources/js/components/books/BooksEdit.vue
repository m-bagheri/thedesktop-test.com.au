<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveBook">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" id="title"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="book.title">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              v-model="book.description"></textarea>
                </div>
            </div>

            <div>
                <label for="file_url" class="block text-sm font-medium text-gray-700">File</label>
                <div class="mt-1">
                  <a :href="'/storage/' + book.currentFile" target="_blank">{{ book.currentFile }}</a>
                </div>
                <div class="mt-1">
                    <input type="file" name="file_url" id="file_url"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           @change="appendFile($event.target.name, $event.target.files)">
                </div>
            </div>

          <div>
            <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
            <div class="mt-1">
              <select name="author_id" id="author_id"
                      class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                      v-model="book.author_id">
                <option value="">Select an author</option>
                <option v-for="author in authors" :value="author.id">{{ author.full_name }}</option>
              </select>
            </div>
          </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <div class="mt-1">
                  <select name="category" id="category"
                          class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          v-model="book.category">
                    <option value="">Select category</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-fiction">Non-fiction</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
            </div>

          <div>
              <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
              <div class="mt-1">
                  <input type="text" name="isbn" id="isbn"
                     class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                     v-model="book.isbn">
              </div>
          </div>

        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script setup>
import useBooks from "@/composables/books";
import useAuthors from "@/composables/authors";
import { onMounted } from "vue";

const { errors, book, getBook, updateBook } = useBooks()
const { authors, getAuthors } = useAuthors()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(getBook(props.id))
onMounted(getAuthors())


const saveBook = async () => {
    await updateBook(props.id)
}
const appendFile = (name, files) => {
  book.value.file_url = files[0]
}
</script>
