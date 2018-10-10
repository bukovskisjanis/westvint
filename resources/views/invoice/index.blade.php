@extends('layouts.master')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Invoice list</h3>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-invoice">Add new Invoice</button>
  </div>
    <div class="box-header">
      <h3 class="box-title">Search</h3>
          <div class="row">
            <div class="col-md-2 col-lg-2">
              <div class="form-group">
                <label>Client Name</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label>Invoice number</label>
                    <input type="text" class="form-control" name="rekinanr" id="rekinanr">
                </div>
            </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label>Payment statuss</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Recived payment</option>
                    <option>Didnt recived payment </option>
                    <option>Cancel Invoice</option>
                  </select>
                </div>
              </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="col-md-2 col-lg-2 pull-right">
              <div class="form-group">
                    <div class="input-group">
                        <button type="button" class="btn  btn-primary btn-flat"><i class="fa fa-eye"></i>   Search</button>
                        <button type="button" class="btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i>   Delete search</button>
                    </div>
              </div>
            </div>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-responsive table-hover">
                    <thead>
                      <tr>
                         <th>ID</th>
                         <th>Client Name</th>
                         <th>Start date</th>
                         <th>Due date</th>
                         <th>Invoice Statuss</th>
                         <th>Invoice date</th>
                         <th>Price</th>
                         <th>Invoice created by</th>
                         <th>Edit date</th>
                         <th>Editor</th>
                         <th>Data Settings</th>
                         <th>Download</th>
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
                        <td>
                          <div class="btn-group">
                              <button type="button" class="btn btn-view btn-flat"><i class="fa fa-eye"></i></button>
                              <button type="button" class="btn btn-edit btn-flat"><i class="fa fa-edit "></i></button>
                              <button type="button" class="btn btn-delete btn-flat"><i class="fa fa-times-circle"></i></button>
                              <button type="button" class="btn btn-success btn-flat"><i class="fa fa-check"></i>  Recived payment</button>
                              <button type="button" class="btn btn-default btn-flat"><i class="fa  fa-clock-o"></i>  Didnt recived payment </button>
                              <button type="button" class="btn btn-black btn-flat"><i class="fa fa-times-circle"></i>  Cancel Invoice</button>
                          </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-delete btn-flat"><i class="fa  fa-file-pdf-o"></i></button>
                        <delete>
                      </tr>
                  </tbody>
              </table>
  </div>
</div>
<div class="modal fade col-md-12" id="add-invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-long" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        <h2 class="modal-title" id="exampleModalLabel">Add new Invoice</h2>
      </div>
      <form action= method="post">
        {{csrf_field()}}
       <div class="modal-body">
     @include('invoice.add')
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>

    </div>
  </div>
</div>


@endsection
