@extends('layouts.master ')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Products list</h3>
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-product">Add new product</button>
		</div>
		<div class="box-body">
			<table class="table table-responsive table-hover">
			              	<thead>
				                <tr>
				                  <th>ID</th>
						           <th>Group</th>
						           <th>Standart</th>
						           <th>Name</th>
						           <th>Articul</th>
						           <th>Barcode</th>
						           <th>Bordercode</th>
						           <th>DIN/ISO</th>
						           <th>Diameter dm</th>
						           <th>Long dm</th>
						           <th>Material</th>
						           <th>Storage</th>
						           <th>Add storage</th>
						           <th>Person add</th>
						           <th>Edit storage</th>
						           <th>Person edit</th>
						           <th>Product price</th>
						           <th>Product retail price</th>
						           <th>Product wholesale price</th>
						           <th>Product minimum price</th>
						           <th>Product revers price</th>
						           <th>Product neto mass in parcel amount</th>
						           <th>Product neto mass in parcel</th>
						           <th>Product neto mass all</th>
						           <th>Product bruto mass in parcel amount</th>
						           <th>Product bruto mass in parcel</th>
						           <th>Product bruto mass all</th>
						           <th>Product bruto mass all</th>
				                </tr>
			              	</thead>
			                <tbody>
                				@foreach($products as $prod)
				                <tr>
				                	<td>{{$prod->id}}</td>
				                	<td>{{$prod->group}}</td>
				                	<td>{{$prod->standart}}</td>  
				                	<td>{{$prod->name}}</td>  
				                	<td>{{$prod->articul}}</td>  
				                	<td>{{$prod->barcode}}</td>  
				                	<td>{{$prod->bordercode}}</td>  
				                	<td>{{$prod->din_iso}}</td>  
				                	<td>{{$prod->diameter_dm}}</td>  
				                	<td>{{$prod->long_dm}}</td>  
				                	<td>{{$prod->material}}</td>  
				                	<td>{{$prod->storage}}</td>  
				                	<td>{{$prod->add_storage}}</td>  
				                	<td>{{$prod->person_add}}</td> 
				                	<td>{{$prod->edit_storage}}</td>
				                	<td>{{$prod->person_edit}}</td>  
				                	<td>{{$prod->product_price}}</td>  
				                	<td>{{$prod->product_retail_price}}</td>  
				                	<td>{{$prod->product_wholesale_price}}</td>  
				                	<td>{{$prod->product_product_minimum_price}}</td>  
				                	<td>{{$prod->product_revers_price}}</td>  
				                	<td>{{$prod->product_neto_mass_in_parcel_amount}}</td>  
				                	<td>{{$prod->product_neto_mass_in_parcel}}</td>  
				                	<td>{{$prod->product_neto_mass_all}}</td>  
				                	<td>{{$prod->product_bruto_mass_in_parcel_amount}}</td> 
				                	<td>{{$prod->product_bruto_mass_in_parcel}}</td>  
				                	<td>{{$prod->product_bruto_mass_all}}</td>  
				                	<td>
				                		<div class="btn-group">
			                             	<a href="{{url('product/profile')}}">
					                            <button
					                                  class="btn btn-view btn-flat popbutton"
					                                  data-target="">
					                                  <i class="fa fa-eye"></i>
					                            </button>
					                        </a>  
								              <form action="/product/{{$prod->id}}" method="DELETE">
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
	<!-- Edit-Darbinieks-Modal -->
<div class="modal fade col-md-12" id="add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-long" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        <h2 class="modal-title" id="exampleModalLabel">Add new product</h2>
      </div>
      <form action="{{route('product.store')}}" method="post">
      	  {{csrf_field()}}
	      <div class="modal-body">
	      		@include('product.form')
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