<template>
    <select class="form-control" v-model="role_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="role in array_roles" :key="role.id" :value="role.id" v-text="role.name"></option>
    </select>
</template>
<script>

export default {
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      array_roles: [],
      role_id: this.value,
    };
  },
  mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    this.buscar();
  },
  methods: {
    buscar() {
        let me = this;
        axios.get('/role/select').then(function (response){
            me.array_roles = response.data;
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    role_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.role_id = newvalue;
      }
    },
  }
};
</script>