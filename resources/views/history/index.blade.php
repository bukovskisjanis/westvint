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
	                <tr>
	                  <td>22</td>
	                  <td>user_name/surname</td>
	                  <td>invoice_statuss</td>
	                  <td>Timespace</td>
	                </tr>
              </tbody>
            </table>
		</div>
	</div>



@endsection
