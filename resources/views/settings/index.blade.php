@extends('layouts.master')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Settings-data</h3>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-invoice">Add new person</button>
  </div>
  <div class="box-body">
    <table class="table table-responsive table-hover">
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
                         <th>Westvint-Persstatuss</th>
                         <th>Data Settings</th>
                      </tr>
                    </thead>
                    <tbody>




                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <div class="btn-group">
                              <button type="button" class="btn btn-view btn-flat"><i class="fa fa-eye"></i></button>
                              <button type="button" class="btn btn-edit btn-flat"><i class="fa fa-edit "></i></button>
                              <button type="button" class="btn btn-delete btn-flat"><i class="fa fa-times-circle"></i></button>
                          </div>
                        </td>
                      </tr>
                  </tbody>
              </table>
  </div>
  </div>

@endsection
