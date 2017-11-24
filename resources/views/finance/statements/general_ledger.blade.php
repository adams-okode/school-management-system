@forelse($ledgers as $ledger)
<div class="row" style="background:#d0cdcd;">
    <div class="col-md-4">
        <center><h4>Ledger</h4></center>
    </div>
    <div class="col-md-4">
        <center><h4>Debit</h4></center>
    </div>
    <div class="col-md-4">
        <center><h4>Credit</h4></center>
    </div>
</div>
<legend></legend>
<div class="row">
        <div class="col-md-4" >
           <center><h4>{{ $ledger->ledgerName }}</h4></center>
        </div>
        <div class="col-md-4" style="border-left:solid 1px #d0cdcd;">
            @forelse($accounts as $account)
                @if($account->ledger_id == $ledger->id && $account->Type==1)
                  <div class="row" >
                        <div class="col-md-6" >
                            <h5>{{ $account->AccountName }}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ $account->ClosingBalance }}</h5>
                        </div>
                  </div>
                @endif
            @empty
             <p>no accounts</p>
            @endforelse
        </div>

        <div class="col-md-4" style="border-left:solid 1px #d0cdcd; border-right:solid 1px #d0cdcd;">
            @forelse($accounts as $account)
                @if($account->ledger_id == $ledger->id && $account->Type==2)
                  <div class="row" >
                        <div class="col-md-6" >
                            <h5>{{ $account->AccountName }}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ $account->ClosingBalance }}</h5>
                        </div>
                  </div>
                @endif
            @empty
             <p>no accounts</p>
            @endforelse
        </div>

</div> 
<div class="row" style="background:#d0cdcd;">
    <div class="col-md-4">
        <center><h4>Total</h4></center>
    </div>
    <div class="col-md-4">
        <center><h4>{{ $ledger_totals_credit[$ledger->id] }}</h4></center>
    </div>
    <div class="col-md-4">
        <center><h4>{{ $ledger_totals_debit[$ledger->id] }}</h4></center>
    </div>
</div>
<legend></legend>
@empty
     <p>no ledgers</p>
@endforelse


<a class="btn btn-primary" align="right" href="{{ url('finance/reports/generalLedger') }}"><i class="fa fa-print mr-1"></i>Print</a>
