<template>
    <!-- definir aqui el encabezado del componente -->
    <!-- <h4>Lista de Ventas: {{ruta.charAt(0).toUpperCase()}}{{ruta.substr(1)}}</h4> -->
    <!-- escuchamos los eventos del toolbar y redirigimos el mensaje al componente correspondiente, usamos los refs para identificarlos y al ser metodos muy pequeños los escribimos inline en lugar de crear un metodo nuevo -->

    <v-listar-documento-recibido ref="cmp_listado_documento_recibido"></v-listar-documento-recibido>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */

//cargamos el componente solo cuando se cree el componente
const VListarDocumentoRecibido = () => import("@/components/erp/documento/ListarDocumentoRecibido");

export default {
  components: {
    "v-listar-documento-recibido": VListarDocumentoRecibido,
  },
  data() {
    return {
      ruta: "venta"
    };
  }
};
</script>