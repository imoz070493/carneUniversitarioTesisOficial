<template>
  <div>
    <!-- <date-picker
      locale="en_us"
      v-model="fecha"
      format="HH:mm a"
      value-type="format"
      type="time"
      placeholder="hh:mm a"
    ></date-picker> -->
    <date-picker
      v-model="fecha"
      lang="es"
      type="date"
      format="DD-MM-YYYY"
      :disabled="disabled"
      :input-class="{
        'mx-input': true,
        'disabled-date':disabled,
      }"
    ></date-picker>
    <!-- :popupStyle="{left: 0, margin: 'auto', width: '100vw', className: 'mobile-date-picker'}" -->
  </div>
</template>

<script>

/**
 * Componente DatePicker
 */
export default {
  props: {
    value: {
      type: Date | String,
      default: ""
    },
    disabled: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      // fecha: String(this.value).replace(/-/g, '\/')
      fecha: null
    };
  },
  mounted() {
    /**
     * Para fechas utilizar el formato YYYY/mm/dd en vez de YYYY-mm-dd para que no exista diferencia de horas
     */
    // console.log('DatePicker2 Mounted.', this.value);
    if(typeof this.value === "object" && this.value){
      console.log('DatePicker2 True.');
      this.fecha = new Date(this.value.toLocaleDateString().split("/").reverse().join("/"));
    }
    if(typeof this.value === "string" && this.value){
      console.log('DatePicker2 True.');
      // this.fecha = String(this.value).replace(/-/g, '\/');
      // this.fecha = new Date(this.value);
      this.watchValue(this.value);
    }
  },
  methods: {
    watchValue(val){
      console.log('value',this.value)
      if(typeof val === "string"){
        // this.fecha = String(val).replace(/-/g, '\/');
        this.fecha = new Date(String(val).replace(/-/g, '\/'));
      }
      if(typeof val === "object"){
        // this.fecha = new Date(new Date(val).getFullYear()+'/'+(new Date(val).getMonth()+1)+'/'+new Date(val).getDate());
        // this.fecha = new Date("2020/10/8");
      }
    }
  },
  watch: {
    //CUANDO SE ACTUALIZA DESDE UN COMPONENTE PADRE
    value: function(val) {
      console.log("Watch value")
      console.log("Set Fecha: ",val)
      console.log("Tipo Dato: ",(typeof val))
      if(val){
        this.watchValue(val);
      }
    },
    fecha: function(newvalue, oldvalue) {
      console.log("Watch fecha")
      if (newvalue) {
        console.log("Get Fecha: ",newvalue)
        // console.log("Tipo Dato: ",(typeof newvalue))
        if(typeof newvalue === 'string'){
          this.$emit('input',new Date("2020/10/8"));
          // this.$emit('input',new Date(newvalue));
        }else{
          this.$emit("input", newvalue);
        }
      }
    },
  }
};
</script>
<style>
    .disabled-date{
      background-color: #c2cfd6;
    }
    .disabled-date:disabled {
      opacity: 1 !important;
    }
    /* .startDate {
      position:relative;
      float: left;
      margin-top: -40px;
    } */
</style>