@extends('layouts.master ')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
                <img src="../../dist/img/tabler.svg" class="header-brand-img invoice-logo" alt="">
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="row invoice-info invoice-padding">
        <div class="col-sm-12 col-md-12 company-border">
              <div class="address text-left">
                    <span>Pavadzīmes nr:</span> UZ-2018-2212-003<br>
                    <span>Izrakstīšanas datums:</span>2018.gada 12. decembris<br>
              </div>
        </div>
      </div>
      <!-- info row -->
      <div class="row invoice-info invoice-padding">
        <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="address text-left">
                  <span>Nosūtītājs:</span>SIA "WESTVINT"<br>
                  <span>Juridiskā adrese:</span>Katlakalna 9, Rīga,LV1073<br>
                  <span>Reģ.Nr.:</span><br>
                  <span>PVN reģ.nr.:</span><br>
                  <span>Banka:</span><br>
                  <span>Kods:</span><br>
                  <span>Konts (EUR):</span><br>
                  <span>Izsniegšanas adrese:</span><br>
              </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="address text-right">
              <span>Saņēmējs</span>SIA "KAUT KĀDS"<br>
              <span>Juridiskā adrese:</span>Atejistu 22, Rīga,LV1073<br>
              <span>Reģ.Nr.:</span><br>
              <span>PVN reģ.nr.:</span><br>
              <span>Banka:</span><br>
              <span>Kods:</span><br>
              <span>Konts (EUR):</span><br>
              <span>Saņemšanas adrese:</span><br>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row invoice-info invoice-padding">
        <div class="col-sm-12 col-md-12 company-border">
              <div class="address text-left">
                    <span>Parvadātājs:</span> UZ-2018-2212-003<br>
                    <span>Samaksas noteikumi:</span> Pārskaitījums<br>
                    <span>Samaksas datums:</span> 2018.gada 12. decembris<br>
                    <span>Darījuma raksturs</span> Preču piegāde (pārdošana)<br>
                    <span>Piegādes/saņemšanas datums:</span> 2018.gada 12. decembris<br>
              </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive push">
          <table class="table table-bordered black-border table-striped">
            <tbody>
              <tr>
                <th class="text-center" style="width: 1%"></th>
                <th class="text-left" style="width: 10%">KODS</th>
                <th class="text-left" style="width: 55%">
                  <div class="text-muted">Produkts<span>(Nosaukums | DIN-ISO | Diametrs dm / Garums dm | Materiāls)</span></div>
                </th>
                <th class="text-right" style="width: 1%">Daudzums</th>
                <th class="text-right" style="width: 16%">Vienības Cena bez PVN</th>
                <th class="text-right" style="width:10%">Cena ar PVN</th>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
              <tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
                <td class="text-center">3</td>
                <td>
                  Logo Creation
                </td>
                <td></td>
                <td class="text-center">
                  5
                </td>
                <td class="text-right">$1.800,00</td>
                <td class="text-right">$1.800,00</td>
              </tr>
              <tr>
                <td colspan="5" class="font-w600 text-right">Cena bez PVN</td>
                <td class="text-right">$25.000,00</td>
              </tr>
              <tr>
                <td colspan="5" class="font-w600 text-right">PVN 21%</td>
                <td class="text-right"> 0,00 </td>
              </tr>
              <tr>
                <td colspan="5" class="font-w600 text-right"><span>(PVN likuma 142.pants Kods:R9 Īpašais PVN piemeršoanas rēžīms Nodokļa apgrieztā maksāšana)</span></td>
                <td class="text-right">-</td>
              </tr>
              <tr>
                <td colspan="5" class="font-weight-bold text-uppercase text-right">Apmaksa</td>
                <td class="font-weight-bold text-right">$30.000,00</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <div class="row invoice-info invoice-padding">
        <div class="col-sm-12 col-md-12">
              <div class="address text-left">
                  <p><span>Piezīmes</span><br></p>
                  <span>Bruto masa</span>
                  <span>Neto masa</span>
              </div>
        </div>
      </div>
      <div class="row invoice-info invoice-padding invoice-line">
        <div class="col-sm-6 col-md-6">
              <div class="address text-left">
                  <span>Summa kopā vārdiem EUR:</span>Trīsdesmit tūkstoši eiro nulle centi<br>
                  <span>Izsniedza:</span>   SIA"WestVint"<br>
                  <span>Valdes priekšsēdētājs:</span>   ....................................<br>
                  <span>Vārds Uzvārds:</span>   Artis Lapkovskis<br>
                  <span>2018.gada 12.decembris</span><br>
              </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 col-md-6">
          <div class="address text-right">
              <span>Saņēmējs:</span>   SIA "KAUT KĀDS"<br>
              <span>Vārds Uzvārds:</span> Nezināms Cilvēks<br>
              <span>Amats:</span>   ....................................<br>
              <span>Paraksts:</span>   ....................................<br>
              <span>2018.gada 12.decembris</span><br>
          </div>
        </div>
        <!-- /.col -->
      </div>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
