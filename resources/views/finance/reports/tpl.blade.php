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


            <header>
                
            </header>
            <h1>Kaiboi Technical Training Institute Income Statement</h1>
            <table>
                <tbody>
                    <tr>
                       <td><center></center></td>
        
                       <td><center>Income</center></td>
            
                       <td><center>Expense</center></td>
                    </tr>
                   

                    <tr>  
                        <td></td>  
                        <td>
                            @forelse($accounts as $account)
                                @if( $account->Type==1)
                                
                                            {{ $account->AccountName }} -
                                    
                                            {{ $account->ClosingBalance }}
                                    
                                @endif
                            @empty
                                no accounts
                            @endforelse
                        </td>  
            
                        <td>
                          @forelse($accounts as $account)
                                @if($account->Type==2)
                            
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
        
        
                        <td><center>{{  $tpl_totals_credit }}</center></td>
                
                
                        <td><center>{{  $tpl_totals_debit }}</center></td>
                    </tr>
                </tbody>
            </table>
      


    <br>
    <footer>
        copyright @Kaiboi
    </footer>
    </body>
</html>