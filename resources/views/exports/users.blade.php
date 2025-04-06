<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>User Type</th>
            @foreach ($payment_year as $year)
                <th>{{ $year }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->user_full_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->user_type }}</td>
                @foreach ($payment_year as $year)
                    <td>
                        @foreach ($payment_data as $payment)
                            @if ($payment->user_id == $user->id && $payment->financial_year == $year)
                                {{ $payment->discuss_fees }}
                            @endif
                        @endforeach
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
