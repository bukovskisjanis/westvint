<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function() {
    //invoice edit procedure

    $('#add_invoice').click(function(){
      $('#client_select').show();
      $('#client_name_span').hide(); 
      $('.invoiceProcessorLabelH1').html('Add new Invoice'); 

      if ($(".invoice-line").length >= 5){
        $('.killall').click();
      }

      $('#invoice_id').remove();

      $(':input').val('');

    });


    $('.product_edit_buttonbtn').click(function(){

      $('.invoiceProcessorLabelH1').html('Edit Invoice'); 
      invoiceDetails =JSON.parse($(this).attr('invoice_full_details'));

      //put basic values in fields ...
      $('#client_select').hide();
      $('#client_name_span').html(invoiceDetails.client_name);

      $('#client_name_span').show();
      $('#client_name_span').removeClass('hidden');

      $('#factadress').val(invoiceDetails.factadress);
      $('#regnr').val(invoiceDetails.regnr);
      $('#pvnregnr').val(invoiceDetails.pvnregnr);
      $('#bankname').val(invoiceDetails.bankname);
      $('#bankcode').val(invoiceDetails.bankcode);
      $('#bankaccnr').val(invoiceDetails.bankaccnr);
      $('#devadress').val(invoiceDetails.devadress);
      $('#delivery-type').val(invoiceDetails['delivery-type']);
      $('#paymentmethod').val(invoiceDetails.paymentmethod);
      $('#delivery-model').val(invoiceDetails['delivery-model']);
      $('#payment-date').val(invoiceDetails['payment-date']);
      $('#dev-entry-date').val(invoiceDetails['dev-entry-date']);
      $('#moreinfo').val(invoiceDetails.moreinfo);
      $('#total_netto').val(invoiceDetails.total_netto);
      $('#total_brutto').val(invoiceDetails.total_brutto);
      $('#price-name').val(invoiceDetails['price-name']);
      $('#product').val(invoiceDetails.product);
      $('#vendor_company').val(invoiceDetails.vendor_company);
      $('#vendor_representative').val(invoiceDetails.vendor_representative);
      $('#vendor_jobtitle').val(invoiceDetails.vendor_jobtitle);
      $('#vendor_jobtitle_hidden').val(invoiceDetails.vendor_jobtitle_hidden);
      $('#invoice-date-writen').val(invoiceDetails['invoice-date-writen']);
      $('#client_name').val(invoiceDetails.client_name);
      $('#namesurname').val(invoiceDetails.namesurname);
      $('#jobtitle').val(invoiceDetails.jobtitle);
      $('#client-signature').val(invoiceDetails['client-signature']);
      $('#invoice-date-writen').val(invoiceDetails['invoice-date-writen']);
      $('#add-invoice').modal('show');

      if ($(".invoice-line").length >= 5){
        $('.killall').click();
      }

      $('.firstblod').parent().parent().remove();

      productList =JSON.parse(invoiceDetails.product_list);

      for (var i = productList.length - 1; i >= 0; i--) {

        myProductRow = $(".hidden_product_line").clone().removeClass('hidden').removeClass('hidden_product_line');
        myProductRow.find('.product').val(productList.reverse()[i]['name']);
        myProductRow.find('.allqty-price').val(productList.reverse()[i]['allqty-price']);
        myProductRow.find('.product_quantity').val(productList.reverse()[i]['quantity']);
        myProductRow.find('.articul_product_selector').hide();

        $(".invoice_lead_row").append(myProductRow);
      };

      $(".invoice_lead_row").append('<input type="hidden" value="'+invoiceDetails.id+'" name="invoice_id" id="invoice_id" />')
      console.log(productList);
    });


    //invoice product procedures
    $('.product_add_button').click(productAdd);


    function productAdd(addonclass){
      console.log('addin new');

      newProdItem = $(".hidden_product_line").clone().removeClass('hidden').removeClass('hidden_product_line');

      if (typeof addonclass != 'undefined'){
        newProdItem.find('.killall').addClass(addonclass);
      }

      $(".invoice_lead_row").append(
          newProdItem
      );

      $('.killall').unbind('click');
      $('.killall').click(killAll);

      $('.articul_product_selector').unbind('change');
      $('.articul_product_selector').change(productChangeInfo);

      $('.product_quantity').unbind('change');
      $('.product_quantity').change(productCountChange);
    }

    function killAll(){

      if (!$(this).parent().parent().hasClass('hidden_product_line')){
        console.log($(this).parent().parent());

        $('#neto').val(Number($('#neto').val()) - Number($(this).parent().parent().find('select').attr('neto')));
        $('#brutto').val(Number($('#brutto').val()) - Number($(this).parent().parent().find('select').attr('brutto')));

        $(this).parent().parent().remove();
        if ($(".invoice-line").length <= 5){
          productAdd('firstblod');
        }
      }
    }


    function productChangeInfo(){
        console.log('prodCXhanfge');
        if ($(this).val() > 0){
          productData = JSON.parse($('option:selected', this).attr('details'));
          console.log( $(this).parent().parent());
          $(this).parent().parent().find('.product').val(productData.name + ' ' + productData.din_iso + ' ' +  productData.diameter_dm + '/' +productData.diameter_dm + ' ' +  productData.material);
          $(this).parent().parent().find('.oqty-price').val(productData.product_price);
          $(this).parent().parent().find('.product_quantity').val(1);
          $(this).parent().parent().find('.allqty-price').val(productData.product_price);

          $(this).parent().parent().find('.hidden_articul').val(productData.articul);

          $('#neto').val(Number($('#neto').val()) - Number($(this).attr('neto')));
          $('#brutto').val(Number($('#brutto').val()) - Number($(this).attr('brutto')));

          $('#neto').val(Number($('#neto').val()) + (Number(productData.product_neto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())) );
          $('#brutto').val(Number($('#brutto').val()) + (Number(productData.product_bruto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())) );

          $(this).attr('brutto' , (Number(productData.product_bruto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())));
          $(this).attr('neto' , (Number(productData.product_neto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())));


          $(this).attr('base_brutto' , Number(productData.product_bruto_mass_all));
          $(this).attr('base_neto' , Number(productData.product_neto_mass_all));

        }else{
          $(this).parent().parent().find('.product').val('');
          $(this).parent().parent().find('.oqty-price').val('');

          $('#neto').val(Number($('#neto').val()) - Number($(this).attr('neto')));
          $('#brutto').val(Number($('#brutto').val()) - Number($(this).attr('brutto')));

          $(this).attr('brutto' , 0);
          $(this).attr('neto' , 0);
        }

    }


    $('.articul_product_selector').change(productChangeInfo);

    function productCountChange(){
        if ($(this).val() > 0){
          pricePerOne = $(this).parent().parent().find('.oqty-price').val();
          pricePerAll = (pricePerOne * $(this).val());
          $(this).parent().parent().find('.allqty-price').val(pricePerAll);

          $('#neto').val(Number($('#neto').val()) - Number($(this).parent().parent().find('select').attr('neto')));
          $('#brutto').val(Number($('#brutto').val()) - Number($(this).parent().parent().find('select').attr('brutto')));

          $('#neto').val(Number($('#neto').val()) + (Number($(this).parent().parent().find('select').attr('base_neto')) * Number($(this).parent().parent().find('.product_quantity').val())) );
          $('#brutto').val(Number($('#brutto').val()) + (Number($(this).parent().parent().find('select').attr('base_brutto')) * Number($(this).parent().parent().find('.product_quantity').val())) );

          $(this).parent().parent().find('select').attr('brutto' , (Number(productData.product_bruto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())));
          $(this).parent().parent().find('select').attr('neto' , (Number(productData.product_neto_mass_all) * Number($(this).parent().parent().find('.product_quantity').val())));

        }else{
          $(this).parent().parent().find('.allqty-price').val(0);

          $('#neto').val(Number($('#neto').val()) - Number($(this).parent().parent().find('select').attr('neto')));
          $('#brutto').val(Number($('#brutto').val()) - Number($(this).parent().parent().find('select').attr('brutto')));

          $(this).parent().parent().find('select').attr('brutto',0);
          $(this).parent().parent().find('select').attr('neto',0);
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
              <span id="client_name_span" class="hidden"></span>
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
                  <select  neto=0 brutto=0 class="form-control select2 articul_product_selector" style="width: 100%;"name="articul[]" class="articul">
                    <option selected="selected">-----</option>
                    @foreach($products as $product)
                      <option value="{{$product->id}}" details="{{json_encode($product)}}" >{{ $product->articul}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="hidden_articul" name="hidden_articul[]">
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
                  <select neto=0 brutto=0 class="form-control select2 articul_product_selector" style="width: 100%;"name="articul[]">
                    <option selected="selected">-----</option>
                    @foreach($products as $product)
                      <option value="{{$product->id}}" details="{{json_encode($product)}}" >{{ $product->articul}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="hidden_articul" name="hidden_articul[]">
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
                  <button type="button" class="firstblod killall form-control btn  btn-danger btn-flat"><i class="fa fa-times-circle"></i></button>
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
                        <input type="text" class="form-control" name="total_netto" id="neto" value="0">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="">Bruto masa</label>
                        <input type="text" class="form-control" name="total_brutto"  id="brutto" value="0">
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

                <input type="hidden" name="vendor_company" value="WestVint" id="vendor_company">

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
