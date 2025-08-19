<template>
    <!-- definir aqui el encabezado del componente -->
    <!-- <h4>Lista de Ventas: {{ruta.charAt(0).toUpperCase()}}{{ruta.substr(1)}}</h4> -->
    <!-- escuchamos los eventos del toolbar y redirigimos el mensaje al componente correspondiente, usamos los refs para identificarlos y al ser metodos muy pequeños los escribimos inline en lugar de crear un metodo nuevo -->
    <div>
      <!-- <h1>numero {{ numero }}</h1> -->
      <v-listar-perfil ref="cmp_listado_categoria"></v-listar-perfil>
    </div>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */
import { mapState } from 'vuex'

//cargamos el componente solo cuando se cree el componente
const VListarPerfil = () => import("@/components/erp/perfil/ListarPerfil");

export default {
  components: {
    "v-listar-perfil": VListarPerfil,
  },
  data() {
    return {
      ruta: "venta"
    };
  },
  computed: {
    ...mapState(['numero'])
  }
};
</script>