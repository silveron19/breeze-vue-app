<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    price: "",
});

function storeItem() {
    form.post("/items");
}
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
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex pb-6">
                    <Link href="/items">
                        <SecondaryButton>Back</SecondaryButton>
                    </Link>
                </div>
                <form @submit.prevent="storeItem">
                    <div class="flex flex-wrap -mx-3 mb-6 justify-center">
                        <div class="w-1/2 md:w-1/2 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name"
                            >
                                Item Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-name"
                                type="text"
                                placeholder="enter the item name"
                                v-model="form.name"
                            />
                            <p class="text-xs italic">
                                Please fill out this field.
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6 justify-center">
                        <div class="w-1/2">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-password"
                            >
                                Price
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-price"
                                type="number"
                                placeholder="enter the item price"
                                v-model="form.price"
                            />
                            <p class="text-gray-600 text-xs italic">
                                Please fill out this field.
                            </p>
                        </div>
                    </div>
                    <div class="w-full flex justify-end pb-6 -mx-36">
                        <PrimaryButton type="submit">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
