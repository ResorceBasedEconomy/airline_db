<template>
  <div class="box">
    <input @keyup="getFlights" v-model="textFrom" placeholder="From*" type="text" />
    <!--<input @keyup="getFlights" v-model="textFrom" placeholder="To*" type="text" />-->

   
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Origin airport</th>
          <th>Destenation</th>
          <th>Plane ID</th>
          <th colspan="4">Options</th>
        </tr>
      </thead>
      <tbody>  
        <tr  v-for="flight in flights">
          <td>{{flight.id}}</td>
          <td>{{flight.origin}}</td>
          <td>{{flight.dest}}</td>
          <td>{{flight.plane_id}}</td>
          
          <td>
           <button :data-id="flight.id" class="button"  @click="bookFlight($event)">Book</button>
          </td>
          <td>
            <button  class="button is-warning">Edit</button>
          </td>
          <td>
           <button  class="button is-info">Save</button>
          </td>
          <td>
           <button  class="button is-danger">X</button>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</template>

<script>
  // import FlightPreview from './flight-preview.vue'
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
      },

      deleteFlight($event) {
        console.log('$event', $event);

        //  this.$http.delete(`http://localhost:80/airline/server/api/flightAPI.php?id=${this.$event}`)
        //   .then(res => res.json()
        //   .then(flight => {
        //     this.flights = Object.values(flight);
        //     console.log('this.flights', this.flights);
        // }));
      },
      bookFlight(event) {
        let currFlightId = event.target.dataset.id;
        
        
      }

    },
    components: {
      // 'flight-preview': FlightPreview
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