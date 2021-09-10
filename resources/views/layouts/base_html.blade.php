@extends('layouts.base')

@section('styles')
<style>

.main-header {
	background: black;
	color: white;
	height: 100px;
	padding-bottom:84px;
	width: 100%;
	left: 0;
	top: 0;
}	
	.main-header a {
		color: white;
	}
	
	
/*
 * Logo
 */

	
	

/*
 * Navegación
 */
nav {
	float: left;
}
	nav ul {
		margin: 0;
		padding: 0;
		list-style: none;
		padding-right: 10px;
	}
	
		nav ul li {
			display: inline-block;
		}
			
			nav ul li a {
				display: block;
				padding: 0 10px;
				text-decoration: none;
			}
			
				nav ul li a:hover {
					background:red;
				}
	




</style>
    
@endsection

@section("menu")
<div class="container-fluid">
	<div class="row justify-content-between align-items-center bg-dark pt-3 pb-3">
		<div class="col-3 col-md-2">
			<a href="{{url('/salir')}}" class="text-light" style="text-decoration: none;"><i id="arrow-circle-left" class="fas fa-arrow-circle-left me-2"></i>Salir</a>
		</div>
		<div class="col-5 col-md-2">
			<a id="logo-header" href="http://www.sistemas.uadec.mx/">
				<img src={{asset("images/sistemas.jpg")}} class="w-100" >
			</a>
		</div>
	</div>

</div>
<div class="container-fluid">
	@yield('body')
</div>
	
@endsection