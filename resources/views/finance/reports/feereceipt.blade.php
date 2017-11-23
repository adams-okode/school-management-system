<style>
    td{
        border: 0px;
        text-align:center;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
</style>
<div style="width:33.3333%; height:auto;">
        <h3>{{ $student->admission_number}}</h3>
    </div>
    <div style="width:33.3333%; height:auto;">
        
    </div>
    <div style="width:33.3333%; height:auto;">
        
    </div>
<div style="border:solid #dddddd 1px; border-radius:5%;">
    
    <table>

        <tr style="border-bottom:1px solid black; background:#dddddd;">
            <td>Item</td>
            <td>Amount</td>
        </tr>
        
        @foreach($items as $item)
            <tr>
                <td>{{ $item }}</td>
                <td>{{ $payment->$item }}</td>
            </tr> 
        @endforeach 

        <tr>
            <td>Total</td>
            <td>{{ $payment->total }}</td>
        </tr>
        
    </table>
</div>