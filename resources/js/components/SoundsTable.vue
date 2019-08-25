<template>
  <div class="table-responsive">
    <table class="table align-items-center table-flush table-sm table-striped">
      <thead class="thead-light">
        <tr>
          <th scope="col"></th>
          <th scope="col">{{ titles.order }}</th>
          <th scope="col">{{ titles.enabled }}</th>
          <th scope="col">{{ titles.title }}</th>
          <th scope="col">{{ titles.file }}</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <draggable tag="tbody" :list="soundsNew" :element="'tr'" handle=".handle" @end="updateItemOrder" :options="{animation:200, group:'status'}">
        <tr v-for="(sound, index) in soundsNew" :key="sound.id" :data-id="sound.id">
          <td scope="row">
            <i class="fas fa-bars text-muted cursor-grab handle"></i>
          </td>
          <td>{{ sound.sort_order }}</td>
          <td>
            <label class="custom-toggle mt-1 mb--1">
              <input type="checkbox" :checked="checkSelected(sound.enabled)" @change="updateEnabled(sound, index)">
              <span class="custom-toggle-slider rounded-circle"></span>
            </label>
          </td>
          <td>{{ sound.title }}</td>
          <td>{{ sound.file }}</td>
          <td class="text-right">
            <div class="dropdown">
              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" :href=viewUrl(sound.id)>
                  {{ titles.view }}
                </a>
                <a class="dropdown-item" :href=editUrl(sound.id)>
                  {{ titles.edit }}
                </a>
                <button type="button" class="dropdown-item" @click="deleteSoundTrigger(sound)">
                  {{ titles.delete }}
                </button>
              </div>
            </div>
          </td>
        </tr>
      </draggable>
    </table>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
export default {
  display: "Table",
  components: {
    draggable
  },
  props: [
    'titles',
    'sounds'
  ],
  data() {
    return {
      soundsNew: this.sounds,
      dragging: false
    }
  },
  methods: {
    viewUrl: function(id) {
      return 'sounds/'+id
    },
    editUrl: function(id) {
      return 'sounds/'+id+'/edit'
    },
    checkSelected: function(value) {
      if (value) {
        return 'checked'
      }
    },
    updateEnabled: function(sound, index) {
      var self = this
      var sound = self.soundsNew[index]
      if (sound.enabled === false) {
        sound.enabled = true
      } else {
        sound.enabled = false
      }
      axios.patch('/api/sound/updateEnabled/'+sound.id, {
        sound: sound,
        userId: self.$userId
      }).then((response) => {
        self.$swal.fire({
          toast: true,
          title: response.data.message,
          type: 'success',
          position: 'top',
          showConfirmButton: false,
          timer: 5000
        })
      }).catch((error) => {
        console.log(error)
      })
    },
    updateItemOrder: function() {
      var self = this
      self.soundsNew.map((sound, index) => {
        sound.sort_order = index + 1
      })
      let sounds = self.soundsNew
      axios.put('/api/sounds/updateAll', {
        sounds: sounds,
        userId: self.$userId
      }).then((response) => {
        self.$swal.fire({
          toast: true,
          title: response.data.message,
          type: 'success',
          position: 'top',
          showConfirmButton: false,
          timer: 5000
        })
      }).catch((error) => {
        console.log(error)
      })
    },
    deleteSoundTrigger: function(sound) {
      var self = this
      self.$swal.fire({
        title: self.titles.modals.delete.title+sound.title,
        text: self.titles.modals.delete.text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#4d4e4f',
        confirmButtonText: self.titles.modals.delete.button
      }).then((result) => {
        if (result.value) {
          self.deleteSoundsViaAPI(sound.id)
        }
      })
    },
    deleteSoundsViaAPI: function(id) {
      var self = this
      axios.post('/api/sound/delete/'+id, {
        userId: self.$userId
      }).then((response) => {
      let index = this.soundsNew.findIndex(sound => sound.id === id)
        self.soundsNew.splice(index, 1)
        self.$swal.fire(
          self.titles.modals.deleted.title,
          response.data.message,
          'success'
        )
      }).catch((error) => {
        console.log(error)
      })
    }
  }
}
</script>
