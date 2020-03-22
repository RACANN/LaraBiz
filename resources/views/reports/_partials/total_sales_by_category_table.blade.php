<thead>
<tr>
    <th>Category</th>
    <th>Total Sales</th>
</tr>
</thead>
<tbody>
@foreach($data as $d)
    <tr>
        <td>{{$d['category']}}</td>
        <td>{{$d['total_sales']}}</td>
    </tr>
@endforeach
</tbody>