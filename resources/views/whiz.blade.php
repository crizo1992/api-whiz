<!DOCTYPE html>
<html>
<head>
	<title>Api-Whiz</title>
	<link rel="stylesheet" type="text/css" href="{{ url('') }}/bootstrap/css/bootstrap.min.css" />
</head>
<body>
	<div>
		<h1> Prueba WHIZ </h1> 
	</div>

	<div id="app">
		
		<table class="table">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DNI</th>
					<th>Foto</th>
					<th>Nacimiento</th>
				</tr>
			</thead>

			<tbody>
				<template v-if="listExiste">
				<tr v-for="wz in whiz" >                    
                    <td>@{{ wz.nombre }}</td>
                    <td>@{{ wz.apellido }}</td>
                    <td>@{{ wz.dni }}</td>
                    <td>                       
                        <img width="40" height="40" v-bind:src="'{{ url('') }}/images/'+ wz.foto">
                    </td>
                    <td>@{{ wz.fecha_nac }}</td>                   
                  </tr>

				</template>
                <template v-else>
                  <tr>
                    <td colspan="9" align="center">Sin resultados</td>
                  </tr>
                </template>
			</tbody>
		</table>

	</div>

	<footer>
		<div>RODRIGUEZ MEZA CHRISTIAN J.</div>
		<div>Dni: 73045344</div>
	</footer>
		
	
	
	
</body>



<script type="text/javascript" src="{{ url('') }}/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ url('') }}/js/vue.js"></script>	
<script src="{{ url('') }}/js/whiz.js"></script>	

<!--https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.0/axios.min.js-->
</html>