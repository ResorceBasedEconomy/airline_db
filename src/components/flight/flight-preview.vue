<template>
    <tr>
       <td>{{flight.id}}</td>
       <td>{{flight.origin}}</td>
       <td>{{flight.dest}}</td>
       <td>{{flight.plane_id}}</td>
    </tr>
</template> 

<script> 
export default {
    props: {
        flight: {
            type: Object,
            required: true
        }
    },
    data() {
            return {

            }
        }
    }       
</script>

<style scoped>
</style>