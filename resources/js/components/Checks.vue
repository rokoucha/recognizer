<template>
  <div class="my-2">
    <div class="py-1 border border-transparent focus-within:border-gray-300">
      <label
        class="flex"
        :class="{
          'focus-within:bg-gray-300': true,
          'focus-within:text-black': !checked,
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
        <span v-if="ordered" class="ml-2">{{ index + 1 }}.</span>
        <span class="ml-2">{{ checks.title }}</span>
      </label>
    </div>
    <div v-if="hasChild" class="ml-10 my-2">
      <div
        v-for="(_, childIndex) in checks.children"
        :key="childIndex"
        class="ml-2"
      >
        <Checks
          v-model="checks.children[childIndex]"
          :index="childIndex"
          :ordered="checks.ordered"
          @set="updateCheckWhichHasChild"
        />
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
      } else {
        document.querySelector('input + a').focus()
      }
    },
  },
}
</script>
