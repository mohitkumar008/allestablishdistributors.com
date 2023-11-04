<tr class="comment-row">
    <td colspan="8">
        <strong>Message: </strong>{{ $row->message }}<br>
        <strong>Manufactror: </strong>{{ $manufacturer ? $manufacturer->company_name : "" }}<br>
        <strong>Product: </strong>{{ $product ? $product->product_name : "" }}<br>
    
    </td>
</tr>
