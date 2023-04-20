import { createRouter, createWebHistory } from "vue-router";

import BooksIndex from '@/components/books/BooksIndex.vue'
import BooksCreate from '@/components/books/BooksCreate.vue'
import BooksEdit from '@/components/books/BooksEdit.vue'

import AuthorsIndex from '@/components/authors/AuthorsIndex.vue'
import AuthorsCreate from '@/components/authors/AuthorsCreate.vue'
import AuthorsEdit from '@/components/authors/AuthorsEdit.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'books.index',
        component: BooksIndex
    },
    {
        path: '/books/create',
        name: 'books.create',
        component: BooksCreate
    },
    {
        path: '/books/:id/edit',
        name: 'books.edit',
        component: BooksEdit,
        props: true
    },
    {
        path: '/authors',
        name: 'authors.index',
        component: AuthorsIndex
    },
    {
        path: '/authors/create',
        name: 'authors.create',
        component: AuthorsCreate
    },
    {
        path: '/authors/:id/edit',
        name: 'authors.edit',
        component: AuthorsEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
