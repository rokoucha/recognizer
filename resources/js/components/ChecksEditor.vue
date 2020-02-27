<template>
  <div class="my-2">
    <div class="flex">
      <div
        class="w-full py-1 border border-transparent focus-within:border-gray-300"
      >
        <label
          class="flex"
          :class="{
            'focus-within:bg-gray-300': true,
            'focus-within:text-gray-300': !checked,
            'focus-within:text-red-700': checked,
            'pl-1': true,
            'text-green-400': checked,
            'w-full': true,
          }"
        >
          <input
            v-model="checked"
            type="checkbox"
            :disabled="hasChild"
            :hidden="hasChild"
            :tabindex="tabindex"
            class="mt-1 mr-2"
            @keydown.prevent.down="focusNextCheckbox"
            @keydown.prevent.up="focusPrevCheckbox"
          />
          <span v-if="hasChild" class="ml-5" />
          <span v-if="ordered" class="ml-2 mt-1">{{ index + 1 }}.</span>
          <input
            v-model="checks.title"
            type="text"
            class="ml-2 p-1 w-full border border-gray-300 bg-gray-900"
          />
        </label>
      </div>
      <button type="button" @click="addChildCheck" class="ml-1">
        ➕
      </button>
      <button type="button" @click="removeMe" class="ml-1">
        ❌
      </button>
    </div>
    <div v-if="hasChild" class="ml-10 my-2">
      <div
        v-for="(_, childIndex) in checks.children"
        :key="childIndex"
        class="ml-2"
      >
        <ChecksEditor
          v-model="checks.children[childIndex]"
          :index="childIndex"
          :ordered="checks.ordered"
          @set="updateCheckWhichHasChild"
          @remove="removeChild"
        />
      </div>
      <div class="mr-8 text-center">
        <button
          type="button"
          class="py-1 w-4/5 bg-gray-700 cursor-pointer text-black"
          @click="addChildCheck"
        >
          ➕
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  model: {
    event: 'change',
    prop: 'checks',
  },
  props: {
    checks: {
      required: true,
      type: Object,
    },
    index: {
      required: true,
      type: Number,
    },
    ordered: {
      required: true,
      type: Boolean,
    },
  },
  computed: {
    hasChild() {
      return 0 < this.checks.children.length
    },
    tabindex() {
      return this.hasChild ? -1 : 0
    },
    checked: {
      get() {
        return this.checks.checked
      },
      set(checked) {
        this.updateValue({ checked })
      },
    },
  },
  methods: {
    addChildCheck() {
      this.checks.children.push({
        title: '',
        checked: false,
        ordered: false,
        children: [],
      })
    },
    focusPrevCheckbox() {
      const elements = document.querySelectorAll(
        'input[type=checkbox]:not([disabled])',
      )
      const index = Array.from(elements).findIndex(
        element => element === event.target,
      )

      if (elements[index - 1] !== undefined) {
        elements[index - 1].focus()
      }
    },
    focusNextCheckbox(event) {
      const elements = document.querySelectorAll(
        'input[type=checkbox]:not([disabled])',
      )
      const index = Array.from(elements).findIndex(
        element => element === event.target,
      )

      if (elements[index + 1] !== undefined) {
        elements[index + 1].focus()
      }
    },
    removeChild(index) {
      this.checks.children.splice(index, 1)
    },
    removeMe() {
      this.$emit('remove', this.index)
    },
    updateCheckWhichHasChild() {
      if (this.hasChild) {
        let allChildIsChecked = true
        this.checks.children.forEach(child => {
          if (!child.checked) {
            allChildIsChecked = false
          }
        })
        this.updateValue({ checked: allChildIsChecked })
      }
    },
    updateValue(diff) {
      this.$emit('change', { ...this.checks, ...diff })
      this.$emit('set', this.checks.title)
    },
  },
}
</script>
