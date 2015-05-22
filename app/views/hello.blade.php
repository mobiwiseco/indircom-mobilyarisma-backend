<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sonuçlar</title>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
</head>
<body>
<style>
table, th, td {
    border: 1px solid black;
}
</style>

	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h1 class="text-center"> Üye Sayısı {{$user}}</h1>
		<h1 class="text-center"> Kullanılan Oy Sayısı {{$kullanılan_oy}}</h1>
		<table  class="col-md-12"style="margin:0 auto">
			
			<!-- Table heading -->
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">name</th>
					<th class="text-center">oy</th>
				</tr>
			</thead>
			<!-- // Table heading END -->
			
			<!-- Table body -->
			<tbody>
			<?php $i=1 ?>
						@foreach($results as $result)
							<!-- Table row -->
								<tr>
									<td class="text-center">{{ $i++ }}</td>
									<td class="text-center"> {{$result->app_name}}</td>
									<td class="text-center">{{$result->total}} </td>
								</tr>
								<!-- // Table row END -->
						@endforeach	

			</tbody>
			<!-- // Table body END -->
			
		</table>
		<!-- // Table END -->	
</div>
	<div class="col-md-3"></div>
</body>
</html>
