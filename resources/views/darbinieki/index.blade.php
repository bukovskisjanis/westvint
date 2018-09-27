@extends('layouts.master')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Employees list</h3>

			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#Add-darbinieks">Add Employee</button>
		</div>
		<div class="box-body">
              <table class="table table-responsive  table-bordered  table-hover">
              	<thead>
	                <tr >
	                  <th>ID</th>
	                  <th>Firstname</th>
	                  <th>Surname</th>
	                  <th>Adress</th>
	                  <th>Birthday</th>
	                  <th>Contract</th>
	                  <th>Phone</th>
	                  <th>Email</th>
	                  <th>Username</th>
	                  <th>Statuss</th>
	                  <th>Data Settings</th>
	                </tr>
              	</thead>
                <tbody>
                	@foreach($darbiniekis as $employees)
                <tr>
                  <td>{{$employees->id}}</td>
                  <td>{{$employees->firstname}}</td>
                  <td>{{$employees->surname}}</td>
                  <td>{{$employees->adress}}</td>
                  <td>{{$employees->birthday}}</td>
                  <td>{{$employees->contract}}</td>
                  <td>{{$employees->phone}}</td>
                  <td>{{$employees->email}}</td>
                  <td>{{$employees->username}}</td>
                  <td>{{$employees->statuss}}</td>
                  <td>
                  	<div class="btn-group">
                              <a href="{{url('darbinieki/profile')}}">
                            <button
                                  class="btn btn-view btn-flat popbutton"
                                  data-target="">
                                  <i class="fa fa-eye"></i>
                            </button>
                        </a>  
                      	<button type="button" 
                      		data-empfirstname="{{$employees->firstname}}" 
                      		data-empsurname="{{$employees->surname}}" 
                      		data-empadress="{{$employees->adress}}"  
                      		data-empbirthdat="{{$employees->birthday}}" 
                      		data-empcontract="{{$employees->contract}}" 
                      		data-empphone="{{$employees->phone}}" 
                      		data-empemail="{{$employees->email}}" 
                      		data-empusernam="{{$employees->username}}" 
                      		data-empsts="{{$employees->statuss}}" 
                      		data-empid="{{$employees->id}}"
                      		class="btn btn-edit btn-flat popbutton"
 
                      		data-toggle="modal" 
                      		data-target="#editdarbinieks">
                      		<i class="fa fa-edit "></i>
                      	</button>
              <form action="/darbinieki/{{$employees->id}}" method="DELETE">
            <button type="submit" class="btn btn-delete btn-flat"><i class="fa fa-times-circle"></i>
              </form>
              </button>

<div class="modal modal-danger fade" id="deletedarbinieks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-long" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-center" id="exampleModalLabel">Delete Employee Profile</h2>

      </div>
      <form action="/darbinieki/{{$employees->id}}" method="DELETE">
      	{{method_field('destroy')}}
      	  {{csrf_field()}}
	      <div class="modal-body modal-delete-body">
	      	<p class="text-center">
	      		Are you sure you want to delete this?

	      		      	</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Don't Delete</button>
	        <button type="submit" class="btn btn-primary">Yes,Delete</button>
	      </div>
      </form>

    </div>
  </div>
</div>
                       <!-- 
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-center">Delete</i></button>
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-right"></i>Block</button>
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-center"></i>Unblock</button>
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-right"></i>View</button> -->
                    </div>
				   </td>

<!--                   /Delte/Block/Ublock/View -->
                </tr>
                @endforeach
              </tbody>
          </table>
		</div>
	</div>

<!-- Button trigger modal -->



<!-- Add-darbinieks-Modal -->
<div class="modal fade col-md-12" id="Add-darbinieks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-long" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        <h2 class="modal-title" id="exampleModalLabel">New Employee creating</h2>

      </div>
      <form action="{{route('darbinieki.store')}}" method="post">
      	  {{csrf_field()}}
	      <div class="modal-body">
	      		@include('darbinieki.add')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>

    </div>
  </div>
</div>


<!-- Edit-Darbinieks-Modal -->
<div class="modal fade col-md-12" id="editdarbinieks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-long" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        <h2 class="modal-title" id="exampleModalLabel">Edit Employee data</h2>
      </div>
      <form action="{{route('darbinieki.update','test')}}" method="post">
      	{{method_field('patch')}}
      	  {{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" class="form-control" name="darbinieki_id" id="employee_id" value="">
	      		@include('darbinieki.edit')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>

    </div>
  </div>
</div>

@endsection