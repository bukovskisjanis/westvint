@extends('layouts.master')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Clients list</h3>
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-client">Add new client</button>
		</div>
		<div class="box-body">
			<table class="table table-responsive  table-bordered table-hover">
              	<thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Name</th>
	                  <th>Factical adress</th>
	                  <th>Delivery Adress</th>
	                  <th>PVN registration nr.:</th>
	                  <th>Registration nr.:</th>
	                  <th>Phone nr.:</th>
	                  <th>Email</th>
	                  <th>Bank name</th>
	                  <th>Bankcode</th>
	                  <th>Bank account number</th>
	                  <th>Description</th>
	                  <th>Data Settings</th>
	                </tr>
              	</thead>
                <tbody>
                	@foreach($clients as $clt)
	                <tr>
	                  <td>{{$clt->id}}</td>
	                  <td>{{$clt->name}}</td>
	                  <td>{{$clt->factadress}}</td>
	                  <td>{{$clt->devadress}}</td>
	                  <td>{{$clt->pvnregnr}}</td>
	                  <td>{{$clt->regnr}}</td>
	                  <td>{{$clt->phonenr}}</td>
	                  <td>{{$clt->email}}</td>
	                  <td>{{$clt->bankname}}</td>
	                  <td>{{$clt->bankcode}}</td>
	                  <td>{{$clt->bankaccnr}}</td>
	                  <td>{{$clt->description}}</td>
	                  <td>
	                  	<div class="btn-group">
                              <a href="{{url('darbinieki/profile')}}">
		                        <button
		                              class="btn btn-view btn-flat popbutton"
		                              data-target="">
		                              <i class="fa fa-eye"></i>
		                        </button>
		                    </a>	                      	<button type="button "
	                      			data-myname="{{$clt->name}}"
	                      			data-myfactadress="{{$clt->factadress}}"
	                      			data-mydevadress="{{$clt->devadress}}"
	                      			data-mypvnregnr="{{$clt->pvnregnr}}"
	                      			data-myregnr="{{$clt->regnr}}"
	                      			data-myphonenr="{{$clt->phonenr}}"
	                      			data-myemail="{{$clt->email}}"
	                      			data-mybankname="{{$clt->bankname}}"
	                      			data-mybankcode="{{$clt->bankcode}}"
	                      			data-mybankaccnr="{{$clt->bankaccnr}}"
	                      			data-mydescription="{{$clt->description}}"
	                      			data-myid="{{$clt->id}}"
		                      		class="btn btn-edit btn-flat popbutton"
		                      		data-toggle="modal"
		                      		data-target="#edit-client">
		                      		<i class="fa fa-edit "></i>
		                      	</button>
				      <form action="/client/{{$clt->id}}" method="DELETE">
								<button type="submit" class="btn btn-delete btn-flat"><i class="fa fa-times-circle"></i>
				      </form>
				      </button>
	                      </div>
	                  </td>
	                </tr>
	                @endforeach
              </tbody>
            </table>
		</div>

	</div>



        <div class="modal fade" id="add-client">
          <div class="modal-dialog modal-dialog-long">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new client</h4>
              </div>
	              <form action="{{route('client.store')}}" method="post">
	               {{csrf_field()}}
	              <div class="modal-body">
		      		@include('client.form')
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-primary">Save</button>
	              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-long"  role="document">
            <div class="modal-content">
              <div class="modal-header">
              	<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Clients data</h4>
              </div>
	              <form action="{{route('client.show','test')}}" method="post">
	               {{csrf_field()}}
	              <div class="modal-body">
		      		@include('client.form')
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-primary">Save</button>
	              </div>
              </form>
            </div>
          </div>
        </div>

@endsection
