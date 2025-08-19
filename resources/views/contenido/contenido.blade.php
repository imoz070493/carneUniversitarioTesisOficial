    @extends('principal')
    @section('contenido')
        <template v-if="$store.state.vuex_menu==0">
            <dashboard></dashboard>
        </template>

        <template v-if="$store.state.vuex_menu==-18">
            <dashboard-estudiante></dashboard-estudiante>
        </template>

        <template v-if="$store.state.vuex_menu==-8">
            <inscrito></inscrito>
        </template>

        <template v-if="$store.state.vuex_menu==-14">
            <inscrito-historico></inscrito-historico>
        </template>

        <template v-if="$store.state.vuex_menu==-9">
            <matricula></matricula>
        </template>

        <template v-if="$store.state.vuex_menu==-12">
            <carga-matricula></carga-matricula>
        </template>

        <template v-if="$store.state.vuex_menu==-10">
            <documento-enviado></documento-enviado>
        </template>

        <template v-if="$store.state.vuex_menu==-11">
            <documento-recibido></documento-recibido>
        </template>

        <template v-if="$store.state.vuex_menu==-15">
            <solicitud-documento></solicitud-documento>
        </template>

        <template v-if="$store.state.vuex_menu==-16">
            <generar-documento></generar-documento>
        </template>

        <template v-if="$store.state.vuex_menu==-6">
            <consulta-documento></consulta-documento>
        </template>

        <template v-if="$store.state.vuex_menu==-7">
            <consulta-cpe></consulta-cpe>
        </template>

        <template v-if="$store.state.vuex_menu==-4">
            <persona-dni></persona-dni>
        </template>

        <template v-if="$store.state.vuex_menu==-5">
            <empresa></empresa>
        </template>

        <template v-if="$store.state.vuex_menu==-3">
            <ingreso-vehiculo></ingreso-vehiculo>
        </template>

        <template v-if="$store.state.vuex_menu==-2">
            <vehiculo></vehiculo>
        </template>

        <template v-if="$store.state.vuex_menu==-1">
            <conductor></conductor>
        </template>

        <template v-if="$store.state.vuex_menu==1">
            <articulo></articulo>
        </template>
        
        <template v-if="$store.state.vuex_menu==2">
            <categoria></categoria>
        </template>

        <template v-if="$store.state.vuex_menu==3">
            <marca></marca>
        </template>

        <template v-if="$store.state.vuex_menu==4">
            <h1>Contenido del menu 4</h1>
        </template>

        <template v-if="$store.state.vuex_menu==5">
            <h1>Contenido del menu 5</h1>
        </template>

        <template v-if="$store.state.vuex_menu==6">
            <h1>Contenido del menu 6</h1>
        </template>

        <template v-if="$store.state.vuex_menu==7">
            <h1>Contenido del menu 7</h1>
        </template>

        <template v-if="$store.state.vuex_menu==8">
            <ingreso></ingreso>
        </template>

        <template v-if="$store.state.vuex_menu==9">
            <proveedor></proveedor>
        </template>

        <template v-if="$store.state.vuex_menu==10">
            <venta></venta>
        </template>

        <template v-if="$store.state.vuex_menu==11">
            <nota></nota>
        </template>

        <template v-if="$store.state.vuex_menu==12">
            <cliente></cliente>
        </template>

        <template v-if="$store.state.vuex_menu==13">
            <role></role>
        </template>

        <template v-if="$store.state.vuex_menu==14">
            <permiso></permiso>
        </template>

        <template v-if="$store.state.vuex_menu==15">
            <usuario></usuario>
        </template>

        <template v-if="$store.state.vuex_menu==16">
            <resumen-boleta></resumen-boleta>
        </template>

        <template v-if="$store.state.vuex_menu==17">
            <resumen-baja></resumen-baja>
        </template>

        <template v-if="$store.state.vuex_menu==18">
            <reporte-compra></reporte-compra>
        </template>

        <template v-if="$store.state.vuex_menu==19">
            <reporte-venta></reporte-venta>
        </template>

        <template v-if="$store.state.vuex_menu==20">
            <perfil></perfil>
        </template>

        <template v-if="$store.state.vuex_menu==23">
            <convocatoria></convocatoria>
        </template>

        <template v-if="$store.state.vuex_menu==-13">
            <periodo-academico></periodo-academico>
        </template>

        <template v-if="$store.state.vuex_menu==-17">
            <estudiante></estudiante>
        </template>
    @endsection