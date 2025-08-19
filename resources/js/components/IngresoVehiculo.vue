<template>
    <!-- definir aqui el encabezado del componente -->
    <!-- <h4>Lista de Ventas: {{ruta.charAt(0).toUpperCase()}}{{ruta.substr(1)}}</h4> -->
    <!-- escuchamos los eventos del toolbar y redirigimos el mensaje al componente correspondiente, usamos los refs para identificarlos y al ser metodos muy pequeños los escribimos inline en lugar de crear un metodo nuevo -->

    <v-listar-ingreso-vehiculo ref="cmp_listado_ingreso_vehiculo"></v-listar-ingreso-vehiculo>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */

//cargamos el componente solo cuando se cree el componente
const VListarIngresoVehiculo = () => import("@/components/erp/ingreso_vehiculo/ListarIngresoVehiculo");

export default {
  components: {
    "v-listar-ingreso-vehiculo": VListarIngresoVehiculo,
  },
  data() {
    return {
      ruta: "venta"
    };
  }
};
</script>