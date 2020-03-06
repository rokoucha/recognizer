<template>
  <div class="my-2 border p-2">
    <div class="flex justify-center">
      <div
        v-for="(attachment, index) in attachments"
        :key="index"
        class="flex-col mx-2 mb-2 w-1/3"
      >
        <a :href="attachment.url" target="blank">
          <img
            class="flex object-scale-down mx-auto mb-1 cursor-pointer"
            :alt="attachment.name"
            :src="attachment.url"
          />
        </a>
        <button
          type="button"
          @click="destroy(attachment.id)"
          class="flex m-auto px-2 bg-gray-700 cursor-pointer text-gray-300"
        >
          🗑 {{ deleteText }}
        </button>
      </div>
    </div>
    <div class="flex w-full justify-center">
      <input
        type="file"
        class="flex my-auto"
        name="attachment"
        accept="image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp"
      />
      <button
        type="button"
        @click="upload"
        class="flex m-auto px-2 bg-gray-700 cursor-pointer text-gray-300"
      >
        🖼 {{ uploadText }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    checklist: {
      required: true,
      type: String,
    },
    data: {
      required: true,
      type: String,
    },
    deleteText: {
      default: 'Delete',
      required: false,
      type: String,
    },
    uploadText: {
      default: 'Upload',
      required: false,
      type: String,
    },
  },
  data() {
    return {
      attachments: JSON.parse(this.data),
    }
  },
  computed: {
    getCsrf() {
      return document.querySelector('input[name="_token"]').value
    },
  },
  methods: {
    destroy(id) {
      if (!confirm('Are you sure you want to delete attachment?')) return
      fetch(`/api/attachments/${id}`, {
        credentials: 'include',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: this.xWwwFormUrlencode({ _token: this.getCsrf }),
        method: 'DELETE',
        mode: 'cors',
      })
        .then(() => {
          this.attachments = this.attachments.filter(
            attachment => attachment.id !== id,
          )
        })
        .catch(console.error)
    },
    upload() {
      const body = new FormData()
      body.append('_token', this.getCsrf)
      body.append('checklist_id', this.checklist)

      const fileSelector = document.querySelector('[name="attachment"]')
      Array.from(fileSelector.files).forEach(file =>
        body.append('attachment', file),
      )

      fetch('/api/attachments', {
        credentials: 'include',
        body,
        headers: {
          Accept: 'application/json',
        },
        method: 'POST',
        mode: 'cors',
      })
        .then(res => res.json())
        .then(attached => this.attachments.push(attached))
        .catch(console.error)
    },
    xWwwFormUrlencode(object) {
      return Object.entries(object)
        .map(([key, value]) => key + '=' + encodeURIComponent(value))
        .join('&')
    },
  },
}
</script>
