<template>
  <div>
    <input
      type="text"
      v-model="keyword"
      class="border border-gray-300 bg-gray-900 text-gray-300 p-1"
    />
    <div
      v-if="0 < checklists.data.length"
      class="absolute border border-gray-700 bg-gray-800"
    >
      <button
        type="button"
        @click="previousPage"
        v-if="1 < currentPage"
        class="bg-gray-700 w-full mt-1 p-2"
      >
        ↑ {{ previousText }}
      </button>
      <ul v-for="(checklist, index) in checklists.data" :key="index">
        <a :href="`/checklist/${checklist.id}`">
          <li class="bg-gray-900 mt-1 p-2">
            {{ checklist.name }}
          </li>
        </a>
      </ul>
      <button
        type="button"
        @click="nextPage"
        v-if="currentPage < checklists.last_page"
        class="bg-gray-700 w-full mt-1 p-2"
      >
        ↓ {{ nextText }}
      </button>
      <div class="bg-gray-800 w-full text-center my-1">
        {{ currentPage }} / {{ checklists.last_page }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checklists: {
        data: [],
        last_page: 1,
      },
      currentPage: 1,
      keyword: '',
    }
  },
  methods: {
    async nextPage() {
      if (this.currentPage < this.checklists.last_page)
        this.currentPage = this.currentPage + 1
      await this.search()
    },
    async previousPage() {
      if (1 < this.currentPage) this.currentPage = this.currentPage - 1
      await this.search()
    },
    async search() {
      const res = await fetch(
        `/api/checklists?name=${this.keyword}&page=${this.currentPage}`,
        {
          credentials: 'include',
          mode: 'cors',
        },
      )
      this.checklists = await res.json()
    },
  },
  props: {
    nextText: {
      default: 'Next',
      required: false,
      type: String,
    },
    previousText: {
      default: 'Previous',
      required: false,
      type: String,
    },
  },
  watch: {
    keyword() {
      this.search()
    },
  },
}
</script>
