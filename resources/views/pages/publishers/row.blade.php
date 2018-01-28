<tr id="publisher-{{ $publisher->id }}">
    <td>
        <a href="#">
            <strong>{{ $publisher->name }}</strong>
        </a>
    </td>
    <td>{{ $publisher->address }}</td>
    <td>{{ $publisher->email }}</td>
    <td>{{ $publisher->contact_number }}</td>
    <td class="text-right text-nowrap">
        <a href="#">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
    </td>
</tr>
