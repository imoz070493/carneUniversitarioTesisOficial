<template>
    <!-- definir aqui el encabezado del componente -->
    <!-- <h4>Lista de Ventas: {{ruta.charAt(0).toUpperCase()}}{{ruta.substr(1)}}</h4> -->
    <!-- escuchamos los eventos del toolbar y redirigimos el mensaje al componente correspondiente, usamos los refs para identificarlos y al ser metodos muy pequeños los escribimos inline en lugar de crear un metodo nuevo -->

    <v-listar-consulta-documento ref="cmp_listado_consulta_documento"></v-listar-consulta-documento>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */

//cargamos el componente solo cuando se cree el componente
const VListarConsultaDocumento = () => import("@/components/erp/consulta_documento/ListarConsultaDocumento");

export default {
  components: {
    "v-listar-consulta-documento": VListarConsultaDocumento,
  },
  data() {
    return {
      ruta: "venta"
    };
  }
};
</script>