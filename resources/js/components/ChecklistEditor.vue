<template>
  <div class="my-4">
    <div v-for="(_, index) in checklist.children" :key="index">
      <ChecksEditor
        v-model="checklist.children[index]"
        :index="index"
        :ordered="checklist.ordered"
        @remove="removeChild"
      />
    </div>
    <button
      type="button"
      class="py-1 mb-4 w-full bg-gray-700 cursor-pointer text-black"
      @click="addCheck"
    >
      ➕
    </button>
    <input type="hidden" name="checks" :value="JSON.stringify(checklist)" />
  </div>
</template>

<script>
import Checklist from '../checklist.js'
import ChecksEditor from './ChecksEditor.vue'

export default {
  components: {
    ChecksEditor,
  },
  props: {
    data: {
      required: true,
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

    const unloadEvent = event => {
      event.preventDefault()
      event.returnValue = ''
    }

    window.addEventListener('beforeunload', unloadEvent)
    Array.from(document.querySelectorAll('button[type=submit]')).forEach(
      element =>
        element.addEventListener('click', () => {
          window.removeEventListener('beforeunload', unloadEvent)
        }),
    )
  },
  methods: {
    addCheck() {
      this.checklist.children.push({
        title: '',
        checked: false,
        ordered: true,
        children: [],
      })
    },
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
    removeChild(index) {
      this.checklist.children.splice(index, 1)
    },
  },
}
</script>
