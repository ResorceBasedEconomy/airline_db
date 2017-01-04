<template>
    <tr>
        <td><input v-model="editedFlight.id"           type="text"     :disabled="editMode" class="input"/></td>
        <td><input v-model="editedFlight.origin"       type="text"     :disabled="editMode" class="input"/></td>
        <td><input v-model="editedFlight.dest"         type="text"     :disabled="editMode" class="input"/></td>
        <td v-if="!editMode"><input  v-model="editedFlight.departure_at" type="datetime-local"  class="input"  /></td>
        <td v-else><input  v-model="editedFlight.departure_at" type="text" class="input" :disabled="editMode" /></td>
        <td><input v-model="editedFlight.plane_id"     type="text"     :disabled="editMode" class="input"/></td>

        <td>
            <button :data-id="flight.id" class="button" @click="bookFlight">Book</button>
        </td>
        <td>
            <button class="button is-warning" @click="editMode = !editMode">Edit</button>
        </td>
        <td>
            <button class="button is-info" @click="saveFlight">Save</button>
        </td>
        <td>
            <button class="button is-danger"  @click="deleteFlight">X</button>
        </td>
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
                editMode: true,
                editedFlight: {
                    id: this.flight.id,
                    origin: this.flight.origin,
                    dest: this.flight.dest,
                    departure_at: this.flight.departure_at,
                    plane_id: this.flight.plane_id
                } 
            }
        },
        methods: {
            bookFlight() {
               
            },
            saveFlight() {           
                this.$emit('updateFlight',  this.editedFlight)
                this.editMode = true;
            },
             deleteFlight() {
                this.$emit('deleteFlight',  this.flight.id)
            }
        }
    }     
</script>

<style scoped>
</style>