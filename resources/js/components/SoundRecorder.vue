<template>

<div class="card-body">
  <div id="controls" class="mb-3">
    <div class="row">
      <div class="col-sm-4 mb-2">
        <button id="recordButton" class="btn btn-danger btn-block" @click="startRecording">
          Record
        </button>
      </div>
      <div class="col-sm-4 mb-2">
        <button id="pauseButton" class="btn btn-primary btn-block" @click="pauseRecording" disabled>
          Pause
        </button>
      </div>
      <div class="col-sm-4 mb-2">
        <button id="stopButton" class="btn btn-warning btn-block" @click="stopRecording" disabled>
          Stop
        </button>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div id="formats" class="mb-3"></div>
  <div v-if="this.isRecording">
    <span style="font-size: 3em" class="text-danger">
      <i class="fas fa-microphone-alt fa-fw fa-beat"></i>
      <i class="fas fa-circle-notch fa-fw fa-spin"></i>
      <span style="font-size: .5em">
        Recording
      </span>
    </span>
  </div>
  <div v-if="this.isPaused">
    <span style="font-size: 3em" class="text-mute">
      <i class="fas fa-microphone-alt-slash fa-fw"></i>
      <i class="fas fa-pause fa-fw"></i>
      <span style="font-size: .5em">
        Paused
      </span>
    </span>
  </div>
  <ul id="recordingsList" class="list-unstyled"></ul>
</div>

</template>

<script>
export default {
  props: [
    'titles'
  ],
  data () {
    return {
      newSound: false,
      gumStream: null,
      rec: null,
      input: null,
      url: null,
      AudioContext: null,
      audioContext: null,
      recordButton: null,
      stopButton: null,
      pauseButton: null,
      constraints: {
        audio: true,
        video:false
      },
      recordingsList: null,
      formats: null,
      isRecording: false,
      isPaused: false
    }
  },
  mounted () {
    var self = this
    self.setupRecorder()
  },
  methods: {
    setupRecorder () {
      this.setWindowURL()
      this.setAudioContext()
      this.setRecorderElements()
    },
    setWindowURL (){
      var self = this
      self.url = window.URL || window.webkitURL
    },
    setAudioContext () {
      var self = this
      self.AudioContext = window.AudioContext || window.webkitAudioContext
      self.audioContext = null
    },
    setRecorderElements () {
      var self = this
      self.recordButton = document.getElementById("recordButton")
      self.stopButton = document.getElementById("stopButton")
      self.pauseButton = document.getElementById("pauseButton")
      self.formats = document.getElementById("formats")
      self.recordingsList = document.getElementById("recordingsList")
    },
    startRecording () {
      var self = this
      if (this.newSound) {
        self.$swal.fire({
          title: 'Clear Current Recording',
          text: 'This will clear the current recording and write over it. This cannot be undone.',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#4d4e4f',
          confirmButtonText: 'Confirm'
        }).then((result) => {
          if (result.value) {
            self.clearRecording()
            self.recordActions()
          }
        })
      } else {
        self.recordActions()
      }
    },
    recordActions () {
      var self = this
      self.isRecording = true
      self.recordButton.disabled = true
      self.stopButton.disabled = false
      self.pauseButton.disabled = false
      navigator.mediaDevices.getUserMedia(self.constraints).then(function(stream) {
        self.audioContext = new AudioContext()
        self.formats.innerHTML="Format: 1 channel pcm @ "+self.audioContext.sampleRate/1000+"kHz"
        self.gumStream = stream
        self.input = self.audioContext.createMediaStreamSource(stream)
        self.rec = new Recorder(self.input,{
          numChannels:1
        })
        self.rec.record()
      }).catch(function(err) {
        // console.log(err)
        self.recordButton.disabled = false
        self.stopButton.disabled = true
        self.pauseButton.disabled = true
      })
    },
    pauseRecording () {
      var self = this
      if (self.rec.recording) {
        self.rec.stop()
        self.isRecording = false
        self.isPaused = true
        self.pauseButton.innerHTML="Resume"
      }else{
        self.rec.record()
        self.isRecording = true
        self.isPaused = false
        self.pauseButton.innerHTML="Pause"
      }
    },
    stopRecording () {
      var self = this
      self.isRecording = false
      self.isPaused = false
      self.stopButton.disabled = true
      self.recordButton.disabled = false
      self.pauseButton.disabled = true
      self.pauseButton.innerHTML="Pause"
      self.rec.stop()
      self.gumStream.getAudioTracks()[0].stop()
      self.newSound = true
      self.rec.exportWAV(self.createDownloadLink)
    },
    createDownloadLink(blob) {
      var self = this
      var url = self.url.createObjectURL(blob)
      var au = document.createElement('audio')
      var li = document.createElement('li')
      var link = document.createElement('a')
      var saveItem = null

      au.controls = true
      au.src = url
      saveItem = self.setupSaveItem(blob)
      li.appendChild(au)
      li.appendChild(link)
      li.appendChild(document.createTextNode (" "))
      li.appendChild(saveItem)
      self.recordingsList.innerHTML = ''
      self.recordingsList.appendChild(li)
    },
    setupSaveItem (blob, filename) {
      var self = this
      var item = null
      var label = null
      var input = null
      var saveItem = null
      item = document.createElement("div")
      item.setAttribute("class", "form-group")
      item.setAttribute("id", "filename_form_group")
      saveItem = document.createElement('div')
      saveItem.setAttribute('class', 'btn btn-success btn-block col-sm-6')
      saveItem.innerHTML = "Save Recording"
      label = document.createElement("LABEL")
      label.setAttribute("for", "filename")
      label.setAttribute("class", "control-label")
      label.appendChild(document.createTextNode("Filename"))
      input = document.createElement("input")
      input.setAttribute("type", "text")
      input.setAttribute("id", "filename")
      input.setAttribute("name", "filename")
      input.setAttribute("placeholder", "filename")
      input.setAttribute('class', 'form-control col-lg-9 mb-3')
      input.required = true
      item.appendChild(label)
      item.appendChild(input)
      item.appendChild(saveItem)
      saveItem.addEventListener("click", function(event) {
        self.saveRecordingtoApi(blob)
      })
      return item
    },
    saveRecordingtoApi (blob) {
      var self = this
      var filenameGroup = document.getElementById("filename_form_group")
      var filenameInput = document.getElementById("filename")
      var filenameInputValue = filenameInput.value
      filenameGroup.setAttribute('class', 'form-group has-feedback')
      var xhr=new XMLHttpRequest()
      xhr.onload=function(e) {
        if(this.readyState === 4) {
          var resp = JSON.parse(e.target.responseText)
          if (resp.error) {
            self.$swal.fire({
              toast: true,
              title: resp.error,
              type: 'warning',
              position: 'top',
              showConfirmButton: false,
              timer: 6500
            })
            return false
          }
          self.clearRecording()
          self.$swal.fire({
            toast: true,
            title: resp.message,
            type: 'success',
            position: 'top',
            showConfirmButton: false,
            timer: 6500
          })
        }
      }
      if (filenameInputValue.length >= 1 && filenameInputValue.length <= 3) {
        self.$swal.fire({
          toast: true,
          title: 'File Name must be more than 3 characters',
          type: 'warning',
          position: 'top',
          showConfirmButton: false,
          timer: 7500
        })
        filenameGroup.setAttribute('class', 'form-group has-error has-feedback')
        return false
      }
      if (filenameInputValue.length < 3) {
        self.$swal.fire({
          toast: true,
          title: 'File Name is required',
          type: 'warning',
          position: 'top',
          showConfirmButton: false,
          timer: 7500
        })
        filenameGroup.setAttribute('class', 'form-group has-error has-feedback')
        return false
      }
      var fd=new FormData()
      fd.append("userId", self.$userId)
      fd.append("audio_data", blob, filenameInputValue)
      xhr.open("POST","/api/upload-sound",true)
      xhr.send(fd)
    },
    clearRecording () {
      var self = this
      self.recordingsList.innerHTML = ''
      self.formats.innerHTML = ''
      self.newSound = false
      self.isPaused = false
    }
  }
}

</script>
