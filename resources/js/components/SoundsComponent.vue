<template>

<b-container>
  <b-row v-if='loaded'>
    <b-col xs='12' sm='6' md='6' lg='4' xl='3' v-for='(sound, index) in sounds' :key='index'>
      <b-card class='mb-4'>
        <b-card-title>
          {{ sound.title }}
        </b-card-title>
        <b-card-text>
          <audio-player :file=sound.file></audio-player>
        </b-card-text>
      </b-card>
    </b-col>
  </b-row>
  <sound-loader v-else></sound-loader>
</b-container>

</template>

<script>
export default {
  name: 'Sounds',
  data () {
    return {
      sounds: [],
      loaded: false
    }
  },
  mounted () {
    var self = this
    self.getSounds()
  },
  methods: {
    getSounds () {
      var self = this
      window.axios.get('/api/sounds').then(({ data }) => {
        self.sounds = data
        self.loaded = true
      });
    }
  }
}
</script>
