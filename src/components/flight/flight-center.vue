<template>
  <div class="box">
    <input @keyup="getFlights('origin',$event.target.value)" v-model="search.origin" placeholder="Origin Airport*" type="text" class="input" />
    <input @keyup="getFlights()" v-model="search.dest" placeholder="Destenation*" type="text" class="input"/>

   <h2>Matching Flights</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Origin airport</th>
          <th>Destenation</th>
          <th>Departue time</th>
          <th>Plane ID</th>
          <th colspan="4">Options</th>
        </tr>
      </thead>
      <tbody  v-for="flight in flights">  
        <flight-preview :flight="flight"
                        @deleteFlight="doDelete"
                        @updateFlight="doUpdate">
          </flight-preview>
      </tbody>
    </table>

  </div>
</template>

<script>
  import FlightPreview from './flight-preview.vue'


  export default {
    data() {
      return {
        textFrom: '',
        search: {origin: '', dest: ''},
        msg: '',
        flights: []
      }
    },
    methods: {
      getFlights() {
        this.$http.get(`api/flightAPI.php?origin="${this.search.origin.toUpperCase()}"`)
          .then(res => res.json()
            .then(flight => {
              this.flights = flight;
              console.log('this.flights', this.flights);
            }));
      },
      doDelete(id) {
        console.log('Deleting flight: ', id);
         this.$http.delete(`api/flightAPI.php?id=${id}`)
          .then(this.getFlights);
      },
      doUpdate(flight) {
        console.log('flight', flight);
        this.$http.put(`api/flightAPI.php?id=${flight.id}`,flight)
          .then(this.getFlights)
      }
    },
    components: {
      'flight-preview': FlightPreview
    },
    created() {
      this.getFlights();
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