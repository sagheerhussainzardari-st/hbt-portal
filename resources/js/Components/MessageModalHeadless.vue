<script setup>
import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const isOpen = ref(false)

const props = defineProps({
  student: Object
});

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}

const form = useForm({
  message: '',
  student_id: props.student.id
});

const submit = () => {
  // alert("Sagheer Here");
  form.post(route('admin.students.send_message'));
  closeModal();
  window.location.reload();
};
</script>
  

<template>
  <div class=" flex items-center justify-center">
    <button type="button" @click="openModal"
      class="rounded-md bg-black mt-2 lg:mt-0 w-36   px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
      Send Message
    </button>
  </div>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class=" max-w-md	  transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                Send Message
                <hr class="mt-2 mb-4">
              </DialogTitle>

              <form @submit.prevent="submit" class="grid grid-cols-1 gap-2">
                <div class="lg:col-span-1 col-span-2">
                  <InputLabel for="name" value="Message" />

                  <textarea id="name" type="text" class="mt-1 block w-full" v-model="form.message" required autofocus
                    autocomplete="name" />

                  <InputError class="mt-2" :message="form.errors.message" />
                </div>
             


                <div class="flex items-center col-span-2 justify-center  mt-4">
                  <PrimaryButton class="px-8"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Send
                  </PrimaryButton>
                </div>
              </form>

            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
  





