<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    items: Array,
});
</script>

<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Items
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex justify-end pb-6">
                    <Link href="/items/create">
                        <PrimaryButton>Add list</PrimaryButton>
                    </Link>
                </div>
                <table class="table-auto w-full bg-white rounded-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in items"
                            class="text-center"
                            :class="{ 'bg-gray-200': index % 2 != 0 }"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.price }}</td>
                            <td>
                                <PrimaryButton>
                                    <Link :href="`/items/${item.id}/edit`"
                                        >Edit</Link
                                    >
                                </PrimaryButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
