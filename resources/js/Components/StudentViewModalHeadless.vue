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
  shifts: Array,
  student: Object
});

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}

const form = useForm({
  id: props.student.id,
  name: props.student.name,
  father_name: props.student.father_name,
  gender: props.student.gender,
  age: props.student.age,
  address: props.student.address,
  phone: props.student.phone,
  emergency_phone: props.student.emergency_phone,
  education: props.student.education,
  cnic: props.student.cnic,
  email: props.student.email,
  shift_id: props.student.shift_id,
  course_id: props.student.course_id,
});

const submit = () => {
  form.post(route('admin.students.update'));
  closeModal();
  window.location.reload();
};
</script>
  

<template>
  <div class=" flex items-center justify-start">
    <p type="button" @click="openModal"  class="text-blue-700 text-left cursor-pointer"  >
      {{ student.name }}
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
                Student View
                <hr class="mt-2 mb-4">
              </DialogTitle>

              <form @submit.prevent="" class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                <div>
                  <InputLabel for="name" value="Name" />

                  <TextInput id="name" type="text" disabled class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />

                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                
                <div >
                  <InputLabel for="fathername" value="Father" />

                  <TextInput id="father_name" type="text" disabled class="mt-1 block w-full" v-model="form.father_name" required 
                    autocomplete="father_name" />

                  <InputError class="mt-2" :message="form.errors.father_name" />
                
                </div>


                <div >
                  <InputLabel for="age" value="Age" />

                  <TextInput id="age" type="number" disabled class="mt-1 block w-full" v-model="form.age" required 
                    autocomplete="age" />

                  <InputError class="mt-2" :message="form.errors.age" />
                
                </div>

                <div >
                  <InputLabel for="address" value="Address" />

                  <TextInput id="address" type="text" disabled class="mt-1 block w-full" v-model="form.address" required 
                    autocomplete="address" />

                  <InputError class="mt-2" :message="form.errors.address" />
                
                </div>


                <div >
                  <InputLabel for="gender" value="Gender" />

                  <select v-model="form.gender"
                  disabled
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                  </select>

                  <InputError class="mt-2" :message="form.errors.gender" />
                </div>


                <div >
                  <InputLabel for="email" value="Email" />

                  <TextInput id="email" type="text" class="mt-1 block w-full" :value="form.email" disabled
                    autocomplete="email" />

                  <InputError class="mt-2" :message="form.errors.email" />
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


                <div >
                  <InputLabel for="shift_id" value="Shift" />

                  <select v-model="form.shift_id"
                  disabled
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option :value="shift.id" v-for="shift in shifts">{{shift.name}}</option>
                  </select>

                  <InputError class="mt-2" :message="form.errors.shift_id" />
                </div>
                <div >
                  <InputLabel for="phone" value="Phone" />

                  <TextInput id="phone" type="tel" disabled class="mt-1 block w-full" v-model="form.phone" required 
                    autocomplete="phone" />

                  <InputError class="mt-2" :message="form.errors.phone" />
                </div>

                <div >
                  <InputLabel for="emergency_phone" value="Emergency Phone" />

                  <TextInput id="emergency_phone" disabled type="tel" class="mt-1 block w-full" v-model="form.emergency_phone" required 
                    autocomplete="emergency_phone" />

                  <InputError class="mt-2" :message="form.errors.emergency_phone" />
                </div>


                <div >
                  <InputLabel for="education" value="Education" />

                  <TextInput id="education" type="text" disabled class="mt-1 block w-full" v-model="form.education" required 
                    autocomplete="education" />

                  <InputError class="mt-2" :message="form.errors.education" />
                </div>

                <div >
                  <InputLabel for="cnic" value="CNIC" />

                  <TextInput id="cnic" type="text"  disabled class="mt-1 block w-full" v-model="form.cnic" required 
                    autocomplete="cnic" />

                  <InputError class="mt-2" :message="form.errors.cnic" />
                </div>

              </form>

            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
  





