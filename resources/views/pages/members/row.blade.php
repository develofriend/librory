<tr id="member-{{ $member->id }}">
    <td>
        <a href="#">
            <strong>{{ $member->name }}</strong>
        </a>
    </td>
    <td>
        <a href="mailto:{{ $member->email }}">
            {{ $member->email }}
        </a>
    </td>
    <td>
        {{ $member->contact_number }}
    </td>
    <td class="text-right">
        <a href="#">
            <i class="fas fa-pencil-alt fafw"></i>
        </a>
    </td>
</tr>
