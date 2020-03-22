<thead>
<tr>
    <th>Employee ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Total Hours</th>
    <th>Total Pay</th>
</tr>
</thead>
<tbody>
@foreach($data as $d)
    <tr>
        <td>{{$d['employee_data']['employee']['id']}}</td>
        <td>{{$d['employee_data']['employee']['first_name']}}</td>
        <td>{{$d['employee_data']['employee']['last_name']}}</td>
        <td>{{$d['employee_data']['total_hours']}}</td>
        <td>{{$d['employee_data']['total_pay']}}</td>
    </tr>
@endforeach
</tbody>