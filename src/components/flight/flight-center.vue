<template>
    <div class="box">
        <input @keyup="getFlights" v-model="textFrom" placeholder="From*" type="text" />
        <input @keyup="getFlights" v-model="textFrom" placeholder="To*" type="text" />

        <ul class="flex ">
            <li v-for="flight in flights">
                <div>
                    Flight ID: {{flight.id}}  From: {{flight.origin}} To: {{flight.dest}} Plane ID: {{flight.plane_id}}
                </div>
                <button type="button" class="button is-primary">X</button>
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
      getFlights() {
        this.$http.get(`http://localhost:80/airline/server/api/flightAPI.php?origin="${this.textFrom.toUpperCase()}"`)
        .then(res => res.json()
        .then(flight => {
          this.flights = Object.values(flight);
          console.log('this.flights', this.flights);
        }));
      }
    }

  }
</script>

<style>
.flex{
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
}
.flightItem {
    border: solid 1px;
}
</style>