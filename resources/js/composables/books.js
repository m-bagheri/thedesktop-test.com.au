import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useBooks() {
    const books = ref([])
    const book = ref([])
    const router = useRouter()
    const errors = ref('')

    const getBooks = async () => {
        let response = await axios.get('/api/books')
        books.value = response.data.data;
    }

    const getBook = async (id) => {
        let response = await axios.get('/api/books/' + id)
        book.value = response.data.data;
        book.value.currentFile = book.value.file_url;
    }

    const storeBook = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/books', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            await router.push({name: 'books.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateBook = async (id) => {
        errors.value = ''
        book.value._method="PUT"
        try {
            await axios.post('/api/books/' + id, book.value, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            await router.push({name: 'books.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyBook = async (id) => {
        await axios.delete('/api/books/' + id)
    }

    return {
        books,
        book,
        errors,
        getBooks,
        getBook,
        storeBook,
        updateBook,
        destroyBook
    }
}
