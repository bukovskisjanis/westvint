@extends('layouts.master')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Settings-data</h3>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-settings-person">Add new person</button>
  </div>
  <div class="box-body">
    <table class="table table-responsive table-hover table-display">
                    <thead>
                      <tr>
                         <th>ID</th>
                         <th>Westvint-name</th>
                         <th>Westvint_persstatuss</th>
                         <th>Westvint_juradress</th>
                         <th>Westvint_regnr</th>
                         <th>Westvint_pvnregnr</th>
                         <th>westvint_bank</th>
                         <th>westvint_bank-code</th>
                         <th>westvint_bank-accnr</th>
                         <th>Westvint-Person</th>
                         <th>Data Settings</th>
                      </tr>
                    </thead>
                    <tbody>

                  @foreach($settings as $setting_item)
                <tr>
                  <td>{{$setting_item->id}}</td>
                  <td>{{$setting_item->westvint_name}}</td>
                  <td>{{$setting_item->westvint_persstatuss}}</td>
                  <td>{{$setting_item->westvint_juradress}}</td>
                  <td>{{$setting_item->westvint_regnr}}</td>
                  <td>{{$setting_item->westvint_pvnregnr}}</td>
                  <td>{{$setting_item->westvint_bank}}</td>
                  <td>{{$setting_item->{'westvint_bank-code'} }}</td>
                  <td>{{$setting_item->{'westvint_bank-accnr'} }}</td>
                  <td>{{$setting_item->westvint_person}}</td>

                  <td>
                    <div class="btn-group"> 
              <form action="/settings/{{$setting_item->id}}" method="DELETE">
            <button type="submit" class="btn btn-delete btn-flat"><i class="fa fa-times-circle"></i>
              </form>
              </button>

              <div class="modal modal-danger fade" id="deletedarbinieks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-long" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title text-center" id="exampleModalLabel">Delete Employee Profile</h2>

                    </div>
                    <form action="/invoice/{{$setting_item->id}}" method="DELETE">
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
              </div></div>
           </td>

                </tr>
                @endforeach
                  </tbody>
              </table>
  </div>
  </div>
  <div class="modal fade col-md-12" id="add-settings-person" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-long" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          <h2 class="modal-title" id="exampleModalLabel">Add new Invoice</h2>
        </div>
      <form action="{{route('settings.store')}}" method="post">
        {{csrf_field()}}
         <div class="modal-body">
       @include('settings.add')
  	      <div class="modal-footer">
  	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
  	        <button type="submit" class="btn btn-primary">Save Changes</button>
  	      </div>
        </form>

      </div>
    </div>
  </div>

@endsection
