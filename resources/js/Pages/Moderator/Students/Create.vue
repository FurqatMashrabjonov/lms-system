<template>
    <Head title="About us"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            Student Qo'shish
        </template>

        <div class="p-4 bg-white rounded-lg shadow-xs">
            <div class=" mb-8 w-full rounded-lg border shadow-xs flex justify-center">
                <form class="w-full m-2 max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                To'liq ism familiya
                            </label>
                            <input v-model="form.fullname" class="block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" id="grid-first-name" type="text">
<!--                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Telefon raqam
                            </label>
                            <input v-model="form.phone" class="block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" id="grid-last-name" type="text">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-address">
                                Yashash manzil
                            </label>
                            <input v-model="form.address" class="block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" id="grid-address" type="text">
                            <!--                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                Email
                            </label>
                            <input v-model="form.email" class="block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" id="grid-email"  autocomplete="off" type="email">
                            <!--                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="grid-password">
                                Password
                            </label>
                            <input v-model="form.password" class="block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight  focus:bg-white"  autocomplete="off" id="grid-password" type="text">
                            <!--                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <Button type="button" @click="create">Saqlash</Button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Button
    },
    data(){
      return {
          form: this.$inertia.form({
              fullname: "",
              email: "",
              password: "",
              phone: "",
              address: "",
          }),
      }
    },
    methods: {
        create(){
            this.form.post(this.route("moderator.student.store"), {
                onFinish: () =>
                    this.$breeze.toast({
                        message: "O'qituvchi qo'shildi",
                        type: "success",
                    }),
            });
        }
    }
}
</script>

<style scoped>

</style>
