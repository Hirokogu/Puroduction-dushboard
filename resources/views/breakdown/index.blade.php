<table>
    <thead>
      <tr>
        <th>日付</th>
        <th>合計金額</th>
        <th>合計金額</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($breakdowns as $breakdown)
      <tr>
        <td>{{ date('Y/m/d', strtotime($breakdown->date)) }}</td>
        <td>{{$breakdown->equipment->process_No}}</td>
        <td>{{$breakdown->count}}</td>
        
      </tr>
    @endforeach
    </tbody>
</table>