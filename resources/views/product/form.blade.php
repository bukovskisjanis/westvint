			<div class="row">
<!-- 				<div class="form-group col-md-4"> 
					<label for="image">Image</label>
	      		</div>
 -->				<div class="form-group col-md-2"> 
					<label for="group">Group</label>
	        		<input type="text" class="form-control" name="group" id="group">
	      		</div>
				<div class="form-group col-md-2"> 
					<label for="standart">Standart</label>
	        		<input type="text" class="form-control" name="standart" id="standart">
	      		</div>
				<div class="form-group col-md-4"> 
					<label for="name">Name</label>
	        		<input type="text" class="form-control" name="name" id="name">
	      		</div>
	      	</div>
			<div class="row">
				<div class="form-group col-md-3"> 
					<label for="articule">Articul</label>
	        		<input type="text" class="form-control" name="articule" id="articule">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="barcode">Barcode</label>
	        		<input type="text" class="form-control" name="barcode" id="barcode" >
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="bordercode">Border code</label>
	        		<input type="text" class="form-control" name="bordercode" id="bordercode">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="din_iso">Din_ISO</label>
	        		<input type="text" class="form-control" name="din_iso" id="din_iso">
	      		</div>
	      	</div>
			<div class="row">
				<div class="form-group col-md-3"> 
					<label for="diameter_dm">Diameter dm</label>
	        		<input type="text" class="form-control" name="diameter_dm" id="diameter_dm">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="long_dm">Long dm</label>
	        		<input type="text" class="form-control" name="long_dm" id="long_dm">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="material">Material</label>
	        		<input type="text" class="form-control" name="material" id="material">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="storage">Storage</label>
	        		<input type="text" class="form-control" name="storage" id="storage">
	      		</div>
	      	</div>
			<div class="row">
				<div class="form-group col-md-3"> 
					<label for="add_storage">Add Storage</label>
	        		<input type="text" class="form-control" name="add_storage" id="add_storage">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="person_add">Person add</label>
	        		<input type="text" class="form-control" name="person_add" id="person_add" disabled="" placeholder="{{Auth::user()->name}}">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="edit_storage">Edit Storage</label>
	        		<input type="text" class="form-control" name="edit_storage" id="edit_storage">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="person_edit">Person Edit</label>
	        		<input type="text" class="form-control" name="person_edit" id="person_edit" disabled="" placeholder="{{Auth::user()->name}}">
	      		</div>
	      	</div>
	      	<div class="row">
				<div class="form-group col-md-2"> 
					<label for="product_price">Product Price</label>
	        		<input type="text" class="form-control" name="product_price" id="product_price">
	      		</div>
				<div class="form-group col-md-2"> 
					<label for="product_retail_price">Product retail price</label>
	        		<input type="text" class="form-control" name="product_retail_price" id="product_retail_price">
	      		</div>
				<div class="form-group col-md-2"> 
					<label for="product_wholesale_price">Product wholesale price</label>
	        		<input type="text" class="form-control" name="product_wholesale_price" id="product_wholesale_price">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="product_minimum_price">Product minimum price</label>
	        		<input type="text" class="form-control" name="product_minimum_price" id="product_minimum_price">
	      		</div>
				<div class="form-group col-md-3"> 
					<label for="product_reverse_price">Product revers price</label>
	        		<input type="text" class="form-control" name="product_reverse_price" id="product_reverse_price">
	      		</div>
	      	</div>
	      	<div class="row">
				<div class="form-group col-md-4"> 
					<label for="product_neto_mass_in_parcel_amount">Product neto mass in parcel amount</label>
	        		<input type="text" class="form-control" name="product_neto_mass_in_parcel_amount" id="product_neto_mass_in_parcel_amount">
	      		</div>
				<div class="form-group col-md-4"> 
					<label for="product_neto_mass_in_parcel">Product neto mass in parcel</label>
	        		<input type="text" class="form-control" name="product_neto_mass_in_parcel" id="product_neto_mass_in_parcel">
	      		</div>
				<div class="form-group col-md-4"> 
					<label for="product_neto_mass_all">Product neto mass all</label>
	        		<input type="text" class="form-control" name="product_neto_mass_all" id="product_neto_mass_all">
	      		</div>
	      	</div>
	      	<div class="row">
				<div class="form-group col-md-4"> 
					<label for="product_minimum_price_amount">Product bruto mass in parcel amount</label>
	        		<input type="text" class="form-control" name="product_bruto_mass_in_parcel_amount" id="product_bruto_mass_in_parcel_amount">
	      		</div>
				<div class="form-group col-md-4"> 
					<label for="product_bruto_mass_in_parcel">Product bruto mass in parcel</label>
	        		<input type="text" class="form-control" name="product_bruto_mass_in_parcel" id="product_bruto_mass_in_parcel">
	      		</div>
				<div class="form-group col-md-4"> 
					<label for="product_bruto_mass_all">Product bruto mass all</label>
	        		<input type="text" class="form-control" name="product_bruto_mass_all" id="product_bruto_mass_all">
	      		</div>
	      	</div>
