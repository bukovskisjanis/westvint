@extends('layouts.master')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Invoice History List</h3>
		</div>
		<div class="box-body">
			<table class="table table-responsive  table-bordered table-hover">
              	<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>user_name/surname</th>
	                  <th>invoice_statuss</th>
	                  <th>Date</th>
	                </tr>
              	</thead>
                <tbody>
                	@foreach($historys as $history)
	                <tr>
	                  <td>{{ $history->id }}</td>
	                  <td>{{ \App\Users::where('id' , $history->user_id)->first()->name }}</td>
	                  <td>{{ $history->invoice_statuss }}</td>
	                  <td>{{ $history->created_at }}</td>
	                </tr>
	                @endforeach
              </tbody>
            </table>
		</div>
	</div>



@endsection
