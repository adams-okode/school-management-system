<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
           table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            h1{
                width:100%;
                min-height:20px;
                color:#000000;
                font-style:underline;
                font-size:16px;
                font-weight:bolder;
                text-align:center;
            }

            header,footer{
                background:#4489e4;
                height:20px;
                text-align:center;
                color:#ffffff;
            }
        </style>
    </head>

    <body>

    @forelse($ledgers as $ledger)
            <header>
                
            </header>
            <h1>Kaiboi Technical Training Institute General Ledger</h1>
            <table>
                <tbody>
                    <tr>
                       <td><center>Ledger</center></td>
        
                       <td><center>Debit</center></td>
            
                       <td><center>Credit</center></td>
                    </tr>
                    <tr>
                        <td><center>{{ $ledger->ledgerName }}</center></td>
                        <td>-</td>
                        <td>-</td>

                    </tr>

                    <tr>  
                        <td></td>  
                        <td>
                            @forelse($accounts as $account)
                                @if($account->ledger_id == $ledger->id && $account->Type==1)
                                
                                            {{ $account->AccountName }} -
                                    
                                            {{ $account->ClosingBalance }}
                                    
                                @endif
                            @empty
                                no accounts
                            @endforelse
                        </td>  
            
                        <td>
                          @forelse($accounts as $account)
                                @if($account->ledger_id == $ledger->id && $account->Type==2)
                            
                                            {{ $account->AccountName }} -
                                    
                                            {{ $account->ClosingBalance }}
                                
                                @endif
                            @empty
                                no accounts
                            @endforelse
                        </td>   
                    </tr>

                    <tr>
                        <td><center>Total</center></td>
        
        
                        <td><center>{{ $ledger_totals_credit[$ledger->id] }}</center></td>
                
                
                        <td><center>{{ $ledger_totals_debit[$ledger->id] }}</center></td>
                    </tr>
                </tbody>
            </table>
      

    @empty
        <p>no ledgers</p>
    @endforelse

    <br>
    <footer>
        copyright @Kaiboi
    </footer>
    </body>
</html>