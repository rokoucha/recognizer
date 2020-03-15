<template>
  <div class="my-2">
    <div v-for="(_, index) in checklist.children" :key="index">
      <Checks
        v-model="checklist.children[index]"
        :index="index"
        :ordered="checklist.ordered"
      />
    </div>
    <a
      class="block mt-4"
      href="/checklist"
      @keydown.prevent.up="focusLastCheckbox"
    >
      <div
        :class="{
          'md:max-w-full': true,
          'md:flex': true,
          'bg-gray-800': !isAllChecked(),
          'bg-teal-300': isAllChecked(),
          'justify-center': true,
        }"
      >
        <div class="mb-4 mt-2 ml-2 mr-2 font-bold text-xl text-black">
          {{ isAllChecked() ? completeText : exitText }}
        </div>
      </div>
    </a>
  </div>
</template>

<script>
import Checklist from '../checklist.js'
import Checks from './Checks.vue'

export default {
  components: {
    Checks,
  },
  props: {
    completeText: {
      default: 'Complete!',
      required: false,
      type: String,
    },
    data: {
      required: true,
      type: String,
    },
    exitText: {
      default: 'Exit',
      required: false,
      type: String,
    },
  },
  data() {
    return {
      checklist: new Checklist(this.data).checks,
    }
  },
  mounted() {
    const firstCheckbox = document.querySelector('input[type=checkbox]')
    if (firstCheckbox) {
      firstCheckbox.focus()
    }

    window.addEventListener('beforeunload', event => {
      if (!this.isAllChecked()) {
        event.preventDefault()
        event.returnValue = ''
      }
    })
  },
  methods: {
    focusLastCheckbox() {
      Array.from(document.querySelectorAll('input[type=checkbox]'))
        .pop()
        .focus()
    },
    isAllChecked() {
      for (const child of this.checklist.children) {
        if (child.checked === false) {
          return false
        }
      }
      return true
    },
  },
}
</script>
