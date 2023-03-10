<template>
    <Listbox :model-value="props.modelValue" :multiple="props.multiple"
        @update:modelValue="value => emit('update:modelValue', value)">
        <div class="relative">
            <label v-if="props.label" class="flex mb-2 text-sm font-medium text-slate-500 items-center space-x-1">
                <span>{{ props.label }}</span>
                <span v-if="props.required" class="font-bold text-red-500">*</span>
                <span v-if="props.isOptional" class="font-bold text-xs">(Optional)</span>
            </label>
            <ListboxButton
                class="relative py-1.5 pr-10 pl-3 w-full text-left bg-white border cursor-pointer focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                <span v-if="label" class="block truncate">{{ label }}</span>
                <span v-else class="text-gray-500">{{ props.placeholder }}</span>
                <span class="flex absolute inset-y-0 right-0 items-center pr-2 pointer-events-none">
                    <ChevronUpDownIcon aria-hidden="true" class="w-5 h-5 text-gray-400" />
                </span>
            </ListboxButton>

            <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <ListboxOptions
                    class="overflow-auto absolute z-10 mt-1 w-full max-h-60 text-base bg-white border focus:outline-none sm:text-sm">
                    <ListboxOption v-for="option in props.options" :key="option.label" v-slot="{ active, selected }"
                        :value="option.value" as="template">
                        <li :class="[
                            active ? 'bg-light text-accent' : 'text-gray-900',
                            'relative cursor-default select-none py-2 pl-10 pr-4',
                        ]">
                            <span :class="[
                                selected ? 'font-medium' : 'font-normal',
                                'block truncate',
                            ]">{{ option.label }}</span>
                            <span v-if="selected" class="flex absolute inset-y-0 left-0 items-center pl-3 text-accent">
                                <CheckIcon aria-hidden="true" class="w-5 h-5" />
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
            <span v-if="props.error" class="text-red-500 font-semibold text-xs tracking-wider">{{ props.error }}</span>
        </div>
    </Listbox>
</template>

<script setup>
import { computed } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, ChevronUpDownIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
    options: Array,
    modelValue: [String, Number, Array],
    placeholder: {
        type: String,
        default: "Select option",
    },
    multiple: Boolean,
    error: String,
    required: Boolean,
    isOptional: Boolean,
    label: String,
});

const emit = defineEmits(["update:modelValue"]);

const label = computed(() => {
    return props.options
        .filter(option => {
            if (Array.isArray(props.modelValue)) {
                return props.modelValue.includes(option.value);
            }

            return props.modelValue === option.value;
        })
        .map(option => option.label)
        .join(", ");
});
</script>
