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

      $('.articul_product_selector').unbind('change');
      $('.articul_product_selector').change(productChangeInfo);

      $('.product_quantity').unbind('change');
      $('.product_quantity').change(productCountChange);
    }

    function killAll(){
      console.log($(this).parent().parent());
      $(this).parent().parent().remove();
      if ($(".invoice-line").length <= 5){
        productAdd();
      }
    }


    function productChangeInfo(){
        console.log('prodCXhanfge');
        if ($(this).val() > 0){
          productData = JSON.parse($('option:selected', this).attr('details'));
          console.log( $(this).parent().parent());
          $(this).parent().parent().find('.product').val(productData.name);
          $(this).parent().parent().find('.oqty-price').val(productData.product_price);
        }else{
          $(this).parent().parent().find('.product').val('');
          $(this).parent().parent().find('.oqty-price').val('');
        }

    }


    $('.articul_product_selector').change(productChangeInfo);

    function productCountChange(){
        if ($(this).val() > 0){
          pricePerOne = $(this).parent().parent().find('.oqty-price').val();
          pricePerAll = (pricePerOne * $(this).val());
          $(this).parent().parent().find('.allqty-price').val(pricePerAll);
        }else{
          $(this).parent().parent().find('.allqty-price').val(0);
        }
    }

    $('.product_quantity').change(productCountChange);

    $('.killall').click(killAll);


    //change of represntative details
    $('#vendor_representative').change(function(){
        if ($(this).val() > 0){
          console.log($('option:selected', this).attr('related_job_title'));
          $('#vendor_jobtitle_hidden').val($('option:selected', this).attr('related_job_title'));
          $('#vendor_jobtitle').val($('option:selected', this).attr('related_job_title'));
        }else{
          $('#vendor_jobtitle_hidden').val('');
          $('#vendor_jobtitle').val('');
        }
    });


    $('#client_select').change(
      function(){
        if ($(this).val() > 0){
          clientData = JSON.parse($('option:selected', this).attr('details'));
          console.log(clientData);
          $('#devadress').val(clientData.devadress);
          $('#factadress').val(clientData.factadress);
          $('#regnr').val(clientData.regnr);
          $('#pvnregnr').val(clientData.pvnregnr);
          $('#bankname').val(clientData.bankname);
          $('#bankcode').val(clientData.bankcode);
          $('#bankaccnr').val(clientData.bankaccnr);
          $('#client_name').val(clientData.name);
        }else{
          $('#devadress').val('');
          $('#factadress').val('');
          $('#regnr').val('');
          $('#pvnregnr').val('');
          $('#bankname').val('');
          $('#bankcode').val('');
          $('#bankaccnr').val('');
          $('#client_name').val('');
        }
      }
    );

  });
</script>



				<div class="row">
          <div class="col-md-2 col-lg-3">
            <div class="form-group">
              <label>Saņēmējs</label>
              <select id="client_select" class="form-control select2" style="width: 100%;">
                <option value=0 >----</option>
                @foreach($clients as $client)
                  <option value="{{$client->id}}" details="{{json_encode($client)}}">{{$client->name}}</option>
                @endforeach
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
                  <select class="form-control select2 articul_product_selector" style="width: 100%;"name="articul" class="articul">
                    <option selected="selected">-----</option>
                    @foreach($products as $product)
                      <option value="{{$product->id}}" details="{{json_encode($product)}}" >{{ $product->articul}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="product">Produkts</label>
                  <input type="text" class="form-control product" name="product[]">
                </div>
                <div class="form-group col-md-1">
                  <label for="qty">Daudzums</label>
                  <input type="text" class="form-control qty product_quantity" name="qty[]">
                </div>
                <div class="form-group col-md-2">
                  <label for="oqty-price">Vienības cena bez PVN</label>
                  <input type="text" class="form-control oqty-price" name="oqty-price[]">
                </div>
                <div class="form-group col-md-2">
                  <label for="allqty-price">Kopējā cena bez PVN</label>
                  <input type="text" class="form-control allqty-price" name="allqty-price[]">
                </div>
                <div class="col-md-1 col-lg-1 form-group">
                  <label>Settings</label>
                  <button type="button" class="killall form-control btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>

            <div class="col-md-12 invoice-line ">
                <div class="form-group col-md-2">
                  <label for="articul">Artikuls</label>
                  <select class="form-control select2 articul_product_selector" style="width: 100%;"name="articul">
                    <option selected="selected">-----</option>
                    @foreach($products as $product)
                      <option value="{{$product->id}}" details="{{json_encode($product)}}" >{{ $product->articul}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group col-md-4">
                  <label for="product">Produkts</label>
                  <input type="text" class="form-control product" name="product[]">
                </div>
                <div class="form-group col-md-1">
                  <label for="qty">Daudzums</label>
                  <input type="text" class="form-control qty product_quantity" name="qty[]">
                </div>
                <div class="form-group col-md-2">
                  <label for="oqty-price">Vienības cena bez PVN</label>
                  <input type="text" class="form-control oqty-price" name="oqty-price[]">
                </div>
                <div class="form-group col-md-2">
                  <label for="allqty-price">Kopējā cena bez PVN</label>
                  <input type="text" class="form-control allqty-price" name="allqty-price[]">
                </div>
                <div class="col-md-1 col-lg-1 form-group">
                  <label>Settings</label>
                  <button type="button" class="killall form-control btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>
        </div>
				<div class="row">
            <div class="col-md-12 invoice-line">
                  <div class="form-group col-md-7">
                      <label for="moreinfo">Piezīmes</label>
                      <input type="text" class="form-control" name="moreinfo" id="moreinfo">
                  </div>
                      <div class="form-group col-md-3">
                        <label for="">Neto masa</label>
                        <input type="text" class="form-control" name="" id="">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="">Bruto masa</label>
                        <input type="text" class="form-control" name="" id="">
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
                  <label for="vendor_representative">Vārds Uzvārds</label>
                  <select class="form-control select2" style="width: 100%;"name="vendor_representative" id="vendor_representative">
                    <option value="0" selected="selected"> -none- </option>
                    @foreach($settings as $settingItem)
                      <option value="{{ $settingItem->id }}" related_job_title="{{ $settingItem->westvint_persstatuss }}" >{{ $settingItem->westvint_person }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label for="vendor_jobtitle">Amats</label>
                  <input type="text" disabled="" class="form-control" name="vendor_jobtitle" id="vendor_jobtitle">
                </div>

                <input type="hidden" name="vendor_jobtitle" id="vendor_jobtitle_hidden" value="Alvis Bukovskis">

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
