<template>

<b-container-fluid>
  <b-row>
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
</b-container-fluid>

</template>

<script>
export default {
  name: 'Sounds',
  data () {
    return {
      sounds: null
    }
  },
  mounted () {
    this.sounds = this.getSounds()
  },
  methods: {
    getSounds () {
      return [
        {
          title: 'Approved',
          file: '/sounds/approved.wav'
        },
        {
          title: 'That\'s a bug',
          file: '/sounds/thatsABug.wav'
        },
        {
          title: 'Tell me how you feel',
          file: '/sounds/tellMeHowYouFeel.wav'
        },
        {
          title: 'Huh',
          file: '/sounds/huh.wav'
        },
        {
          title: 'Hmmm',
          file: '/sounds/hmmm.wav'
        }
      ]
    }
  }
}
</script>
