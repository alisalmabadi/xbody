<table>
    <thead>
    <tr>
      {{--  @foreach($data[0] as $key => $value)
            <th>{{ ucfirst($key) }}</th>
        @endforeach--}}
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>شماره مبایل</th>

    </tr>
    </thead>
    <tbody>
    {{--@foreach($data as $row)
        <tr>
            @foreach ($row as $value)
                <td>{{ $value }}</td>
            @endforeach
        </tr>
    @endforeach--}}
    @foreach($data as $d)

        <tr>
            <td>{{$d->FirstName}}</td>
            <td>{{$d->LastName}}</td>
            <td>{{$d->Mobile}}</td>
        </tr>
        @endforeach
    </tbody>
</table>