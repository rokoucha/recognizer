<template>
  <div>
    <input
      type="text"
      v-model="keyword"
      class="border border-gray-300 bg-gray-900 text-gray-300 p-1"
    />
    <div
      v-if="0 < checklists.length"
      class="absolute border border-gray-700 bg-gray-800"
    >
      <ul v-for="(checklist, index) in checklists" :key="index">
        <a :href="`/checklist/${checklist.id}`">
          <li class="bg-gray-900 mt-1 p-2">
            {{ checklist.name }}
          </li>
        </a>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: '',
      checklists: {},
    }
  },
  methods: {
    async search() {
      const res = await fetch(`/api/checklists?name=${this.keyword}`, {
        credentials: 'include',
        mode: 'cors',
      })
      this.checklists = await res.json()
    },
  },
  watch: {
    keyword(after) {
      this.search(after)
    },
  },
}
</script>
