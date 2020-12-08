<table>
    <thead>
    <tr>
        <th>{{ __('#') }}</th>
        <th>{{ __('User') }}</th>
        <th>{{ __('Level') }}</th>
        <th>{{ __('Menu') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->level }}</td>
            <td>{{ $user->menu->first()->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
