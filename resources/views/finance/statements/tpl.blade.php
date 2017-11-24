
<div class="row" style="background:#d0cdcd;">
    <div class="col-md-4">
        <center><h4></h4></center>
    </div>
    <div class="col-md-4">
        <h4>Income</h4>
    </div>
    <div class="col-md-4">
        <h4>Expense</h4>
    </div>
</div>
<legend></legend>
<div class="row">
        <div class="col-md-4" >
           <center><h4></h4></center>
        </div>
        <div class="col-md-4" style="border-left:solid 1px #ffffff;">
            @forelse($accounts as $account)
                @if($account->Type==1)
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

        <div class="col-md-4" style="border-left:solid 1px #d0cdcd; border-right:solid 1px #ffffff;">
            @forelse($accounts as $account)
                @if($account->Type==2)
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
        <h4>Total</h4>
    </div>
    <div class="col-md-4">
        <h4>{{ $tpl_totals_credit }}</h4>
    </div>
    <div class="col-md-4">
        <h4>{{ $tpl_totals_debit }}</h4>
    </div>
</div>
<legend></legend>

<a class="btn btn-primary" align="right" href="{{ url('finance/reports/tpStatement') }}"><i class="fa fa-print mr-1"></i>Print</a>

