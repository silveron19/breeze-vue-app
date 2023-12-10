<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import SvgIcon from "@jamescoyle/vue-icon";
import { mdiDelete } from "@mdi/js";

const props = defineProps({
    item: Object,
});

const form = useForm({
    name: props.item.name,
    price: props.item.price,
});

function updateItem() {
    form.patch(`/items/${props.item.id}`);
}

function deleteItem() {
    form.delete(`/items/${props.item.id}`);
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
                <div class="w-full flex pb-6 justify-end" @click="deleteItem">
                    <DangerButton
                        ><svg-icon type="mdi" :path="mdiDelete"></svg-icon
                    ></DangerButton>
                </div>
                <form @submit.prevent="updateItem">
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
                                id="grid-first-name"
                                type="text"
                                placeholder="enter the item name"
                                v-model="form.name"
                                :class="{ 'border-red-500': !form.name }"
                            />
                            <p
                                class="text-xs italic"
                                :class="{ 'text-red-500': !form.name }"
                            >
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
                                id="grid-password"
                                type="number"
                                placeholder="enter the item price"
                                v-model="form.price"
                                :class="{ 'border-red-500': !form.name }"
                            />
                            <p
                                class="text-gray-600 text-xs italic"
                                :class="{ 'text-red-500': !form.name }"
                            >
                                Please fill out this field.
                            </p>
                        </div>
                    </div>
                    <div class="inline-flex pb-6 w-full justify-center gap-36">
                        <Link href="/items">
                            <SecondaryButton>Cancel</SecondaryButton>
                        </Link>
                        <div>
                            <PrimaryButton type="submit">Submit</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
