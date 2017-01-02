<template>
  <div id="app">
    from <input type="text" v-model="textFrom" @keyup="submited" />
     <ul class="flex">
      <li v-for="flight in flights">
        {{flight.origin}}
      </li>
    </ul>
  </div>
</template>

<script>


  export default {
    data() {
      return {
        textFrom: '',
        flights: []
      }
    },
    methods: {
      submited() {
        this.$http.get(`http://localhost:80/airline/server/api/flightAPI.php?origin="${this.textFrom.toUpperCase()}"`)
        .then(res => res.json()
        .then(flight => {
          this.flights = Object.values(flight);
          console.log('this.flights', this.flights);
        // this.$http.get(`airline/server/api/planeAPI.php?id=${this.planeId}`)
        // .then(res => res.json()
        // .then(plane => {
        //   this.plane = Object.values(plane);
        //   console.log('this.plane', this.plane);
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
.flex{
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
}
</style>