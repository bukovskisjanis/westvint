<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function() {
    $('.product_add_button').click(productAdd);

    function productAdd(){
      console.log('addin new');
      $(".invoice_lead_row").append(
            $(".hidden_product_line").clone().removeClass('hidden').removeClass('hidden_product_line')
      );
      $('.killall').unbind('click');
      $('.killall').click(killAll);
    }

    function killAll(){
      console.log($(this).parent().parent());
      $(this).parent().parent().remove();
      if ($(".invoice-line").length <= 5){
        productAdd();
      }
    }


    $('.killall').click(killAll);
  });
</script>



				<div class="row">
          <div class="col-md-2 col-lg-3">
            <div class="form-group">
              <label>Saņēmējs</label>
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
		      		<div class="form-group col-md-3">
						    <label for="factadress">Juridiskā adrese</label>
		        		<input type="text" class="form-control" name="factadress" id="factadress">
		      		</div>
		      		<div class="form-group col-md-3">
						    <label for="regnr">Reg.nr.</label>
		        		<input type="text" class="form-control" name="regnr" id="regnr">
		      		</div>
  				<div class="form-group col-md-3">
  					<label for="pvnregnr">PVN reģistrācijas nr.:</label>
  	        		<input type="text" class="form-control" name="pvnregnr" id="pvnregnr">
  	      		</div>
				</div>
				<div class="row">
          <div class="form-group col-md-4">
            <label for="bankname">Bankas nosaukums</label>
                <input type="text" class="form-control" name="bankname" id="bankname">
              </div>
          <div class="form-group col-md-4">
            <label for="bankcode">Bankas kods</label>
                <input type="text" class="form-control" name="bankcode" id="bankcode">
              </div>
          <div class="form-group col-md-4">
            <label for="bankaccnr">Bankas konta numurs</label>
                <input type="text" class="form-control" name="bankaccnr" id="bankaccnr">
              </div>
				</div>
				<div class="row">
            <div class="col-md-12 invoice-line">
            </div>
        </div>
				<div class="row">
          <div class="form-group col-md-12">
              <div class="form-group col-md-12">
                <label for="Deladress">Saņemšanas adrese</label>
                <input type="text" class="form-control" name="devadress" id="devadress">
              </div>
          </div>
				</div>
				<div class="row">
            <div class="col-md-12 invoice-line">
            </div>
        </div>
				<div class="row">
            <div class="col-md-12 invoice-line">
                <div class="form-group col-md-4">
                  <label for="delivery-type">Parvadātājs</label>
                  <input type="text" class="form-control" name="delivery-type" id="delivery-type">
                </div>
                <div class="form-group col-md-4">
                  <label for="paymentmethod">Samaksas noteikumi</label>
                  <input type="text" class="form-control" name="paymentmethod" id="paymentmethod">
                </div>
                <div class="form-group col-md-4">
                  <label for="delivery-model">Darījuma raksturs</label>
                  <input type="text" class="form-control" name="delivery-model" id="delivery-model">
                </div>
                <div class="form-group col-md-6">
                  <label for="payment-date">Samaksas datums</label>
                  <input type="text" class="form-control" name="payment-date" id="payment-date">
                </div>
                <div class="form-group col-md-6">
                  <label for="dev-entry-date">Piegādes/Saņemšanas datums</label>
                  <input type="text" class="form-control" name="dev-entry-date" id="dev-entry-date">
                </div>
            </div>
        </div>
				<div class="row invoice_lead_row">
            <div class="col-md-12">
                  <div class="form-group col-md-2">
                      <button type="button" class="product_add_button form-control btn  btn-primary btn-flat">Pievienot preci</button>
                  </div>
            </div>

            <div class="col-md-12 invoice-line hidden hidden_product_line">
                <div class="form-group col-md-2">
                  <label for="articul">Artikuls</label>
                  <select class="form-control select2" style="width: 100%;"name="articul" id="articul">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="product">Produkts</label>
                  <input type="text" class="form-control" name="product[]" id="product">
                </div>
                <div class="form-group col-md-1">
                  <label for="qty">Daudzums</label>
                  <input type="text" class="form-control" name="qty[]" id="qty">
                </div>
                <div class="form-group col-md-2">
                  <label for="oqty-price">Vienības cena bez PVN</label>
                  <input type="text" class="form-control" name="oqty-price[]" id="oqty-price">
                </div>
                <div class="form-group col-md-2">
                  <label for="allqty-price">Kopējā cena bez PVN</label>
                  <input type="text" class="form-control" name="allqty-price[]" id="allqty-price">
                </div>
                <div class="col-md-1 col-lg-1 form-group">
                  <label>Settings</label>
                  <button type="button" class="killall form-control btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>

            <div class="col-md-12 invoice-line ">
                <div class="form-group col-md-2">
                  <label for="articul">Artikuls</label>
                  <select class="form-control select2" style="width: 100%;"name="articul" id="articul">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="product">Produkts</label>
                  <input type="text" class="form-control" name="product" id="product">
                </div>
                <div class="form-group col-md-1">
                  <label for="qty">Daudzums</label>
                  <input type="text" class="form-control" name="qty" id="qty">
                </div>
                <div class="form-group col-md-2">
                  <label for="oqty-price">Vienības cena bez PVN</label>
                  <input type="text" class="form-control" name="oqty-price" id="oqty-price">
                </div>
                <div class="form-group col-md-2">
                  <label for="allqty-price">Kopējā cena bez PVN</label>
                  <input type="text" class="form-control" name="allqty-price" id="allqty-price">
                </div>
                <div class="col-md-1 col-lg-1 form-group">
                  <label>Settings</label>
                  <button type="button" class="killall form-control btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>
        </div>
				<div class="row">
            <div class="col-md-12 invoice-line">
                <div class="form-group col-md-12">
                  <label for="moreinfo">Piezīmes</label>
                  <input type="text" class="form-control" name="moreinfo" id="moreinfo">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3">
                  <label for="product">Summa vārdiem</label>
                  <input type="text" class="form-control" name="price-name" id="price-name">
                </div>
                <div class="form-group col-md-2">
                  <label for="product">Izsniedza</label>
                  <input type="text" class="form-control" name="product" id="product" disabled="" placeholder="WestVint">
                </div>

                <input type="hidden" name="vendor_company" value="WestVint">

                <div class="form-group col-md-2">
                  <label for="jobtitle">Amats</label>
                  <select class="form-control select2" style="width: 100%;"name="vendor_jobtitle" id="jobtitle">
                    <option selected="selected">Valdes loceklis</option>
                    <option>Valdes priekšsēdētājs</option>
                  </select>
                </div>


                <div class="form-group col-md-2">
                  <label for="qty">Vārds Uzvārds</label>
                  <input type="text" class="form-control" name="" id="person" disabled="" placeholder="Alvis Bukovskis">
                </div>

                <input type="hidden" name="vendor_representative" value="Alvis Bukovskis">                

                <div class="form-group col-md-3">
                  <label for="qty">Datums</label>
                  <input type="text" class="form-control" name="" id="invoice-date-writen">
                </div>
            </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3">
                      <label for="client_name">Saņēmējs</label>
                      <input type="text" class="form-control" name="client_name" id="client_name">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="product">Vārds Uzvārds</label>
                      <input type="text" class="form-control" name="namesurname" id="namesurname">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="jobtitle">Amats</label>
                      <input type="text" class="form-control" name="jobtitle" id="jobtitle">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="client-signature">Paraksts</label>
                      <input type="text" class="form-control" name="" id="client-signature" disabled="">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="qty">Datums</label>
                      <input type="text" class="form-control" name="" id="invoice-date-writen">
                    </div>
                </div>
      </div>
    </div>
