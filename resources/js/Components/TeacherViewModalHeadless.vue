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
  courses: Array,
  teacher: Object
});

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}

const form = useForm({
  id: props.teacher.id,
  name: props.teacher.name,
  about: props.teacher.about,
  email: props.teacher.email,
  course_id: props.teacher.course_id,
});

const submit = () => {
  form.post(route('admin.teachers.update'));
  closeModal();
  window.location.reload();
};
</script>
  

<template>
  <div class=" flex items-center justify-center">
    <p type="button" @click="openModal"  class="text-blue-700 cursor-pointer"  >
      {{ teacher.name }}
  </p>
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
              class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                Teacher View
                <hr class="mt-2 mb-4">
              </DialogTitle>

              <form @submit.prevent="" class="grid grid-cols-2 gap-2">
                <div>
                  <InputLabel for="name" value="Name" />

                  <TextInput id="name" disabled type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />

                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div >
                  <InputLabel for="email" value="Email" />

                  <TextInput id="email" disabled type="text" :value="form.email"  class="mt-1 block w-full"  
                    autocomplete="email" />

                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div >
                  <InputLabel for="about" value="About" />

                  <TextInput id="about" disabled type="text" class="mt-1 block w-full" v-model="form.about" required 
                    autocomplete="about" />

                  <InputError class="mt-2" :message="form.errors.about" />
                </div>
  
                <div >
                  <InputLabel for="course" value="Course" />

                  <select v-model="form.course_id"
                  disabled
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option :value="course.id" v-for="course in props.courses">{{course.name}}</option>
                  </select>

                  <InputError class="mt-2" :message="form.errors.course" />
                </div>

             

                <!-- <div class="flex items-center justify-center col-span-2  mt-4">
                  <PrimaryButton class="px-8"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                  </PrimaryButton>
                </div> -->
              </form>

            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
  





