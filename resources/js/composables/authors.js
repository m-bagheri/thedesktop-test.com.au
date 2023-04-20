import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useAuthors() {
    const authors = ref([])
    const author = ref([])
    const router = useRouter()
    const errors = ref('')

    const getAuthors = async () => {
        let response = await axios.get('/api/authors')
        authors.value = response.data.data;
    }

    const getAuthor = async (id) => {
        let response = await axios.get('/api/authors/' + id)
        author.value = response.data.data;
    }

    const storeAuthor = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/authors', data)
            await router.push({name: 'authors.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateAuthor = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/authors/' + id, author.value)
            await router.push({name: 'authors.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyAuthor = async (id) => {
        await axios.delete('/api/authors/' + id)
    }


    return {
        authors,
        author,
        errors,
        getAuthors,
        getAuthor,
        storeAuthor,
        updateAuthor,
        destroyAuthor
    }
}
