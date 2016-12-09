@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-xs-6">
		<div class="panel panel-default">
		  	<div class="panel-heading">Perfil de  <a href="#" class="label label-warning">{{ Auth::user()->name }}</a></div>
		  	<div class="panel-body">

		    <img src="/uploads/avatars/{{ $user->avatar}}"style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
		    	<form enctype="multipart/form-data" action="/perfil" method="POST">
	                <label>Cambiar imagen de perfil</label>
	                <input type="file" name="avatar">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <input type="submit" class="pull-right btn btn-sm btn-primary">
	            </form>
		  	</div>
		</div>
	</div>

	<div class="col-xs-6">
		<div class="panel panel-default">
			<div class="panel-heading">	
			</div>

			<div class="panel-body">
				<h4>User Name: <span class="label label-info">{{ Auth::user()->name }}</span></h4>
				<h4>Email: <span class="label label-info">{{ Auth::user()->email }}</span></h4>
				<h4>Role:  <span>{{ Auth::user()->role->name }}</span></h4>
				@if($user->role->name == "Admin")
					<span>Eres admin</span>
				@else
					<span>No eres admin</span>	
				@endif
					 
			</div>
		</div>
	</div>	
	
</div>


	



@endsection