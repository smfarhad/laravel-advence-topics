<table>
    @foreach($posts as $row)
    <tr>
        <td> {{$row->active}} </td>
        <td> {{$row->title}} </td>
    </tr>
    @endforeach
</table>
{{ $posts->appends(request()->input())->links() }}