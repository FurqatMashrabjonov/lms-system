<template>
    <Head title="About us"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            Studentlar
        </template>

        <div class="p-4 bg-white rounded-lg shadow-xs">
            <Link style="float: right" class="m-1" :href="route('moderator.student.create')">
                <Button>+Qo'shish</Button>
            </Link>
            <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">

                <div class="overflow-x-auto w-full">
                    <div v-if="students.data.length === 0" style="text-align: center">Studentlar mavjud emas</div>
                    <table class="w-full whitespace-no-wrap" v-else>
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y">
                        <tr v-for="student in students.data" :key="student.id" class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ student.fullname }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ student.phone }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                    <pagination :links="students.links"/>
                </div>
            </div>

        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import Button from '@/Components/Button'
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
        Button,
        Link
    },
    props: {
        students: Object,
    },
    created() {
        console.log(this.students);
    }
}
</script>

<style scoped>

</style>
