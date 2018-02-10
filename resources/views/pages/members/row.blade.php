<tr id="member-{{ $member->id }}" class="@if (! $member->is_active) inactive-member @endif">
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
    <td class="text-right text-nowrap">
        <button type="button" class="acting-as-anchor switch-status @if (! $member->is_active) text-muted @endif" data-url="{{ $member->switchMemberStatusUrl() }}">
            @if ($member->is_active)
                <i class="fas fa-toggle-on fa-fw"></i>
            @else
                <i class="fas fa-toggle-off fa-fw"></i>
            @endif
        </button>
        <a href="{{ $member->editMemberUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
    </td>
</tr>
