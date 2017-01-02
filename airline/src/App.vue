<template>
  <div id="app">
    getPlane <input type="text" v-model="planeId" @keyup="submited" />

  </div>
</template>

<script>


  export default {
    data() {
      return {
        planeId: '',
        plane: null
      }
    },
    methods: {
      submited() {
        this.$http.get(`http://localhost:80/airline/server/api/planeAPI.php?id=${this.planeId}`)
        .then(res => res.json()
        .then(plane => {
          this.plane = Object.values(plane);
          console.log('this.plane', this.plane);
        }));
      }
    }

  }
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>