@extends('layout.FullPage')
<style>
    #layout {
        display: flex;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        height: 95%;
    }

    #memberlist tr:nth-child(even) {
        background-color: #ffdf80;
    }

    #memberlist tr:nth-child(odd) {
        background-color: #ffdf80;
    }

    #memberlist th,
    #memberlist td {
        border: 1px solid white;
        padding: 8px;
    }

    #memberlist {
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #memberlist th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(44, 44, 44);
        color: white;
    }
</style>

@section('content')
    <section id="layout">
        <h1 style="text-align: center; color:white;">MEMBER</h1>
        <div style="display: flex; justify-content: space-between; align-items: flex-end;">
            <a href="/members/add" class="btn btn-outline-success" style="font-weight: bold; padding: 10px;">Tambah</a>
        </div>


        <table id="memberlist">
            <tr class="bg-success">
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Activation</th>
                <th>Transaction Number</th>
                <th>Expired On</th>
                <th>Print</th>
                <th>Action</th>
            </tr>

            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->username }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->address }}</td>
                    @php
                        $hasActiveMembership = false;
                    @endphp
                    @foreach ($memberships as $membership)
                        @if ($member->id == $membership->user_id)
                            <td>Activated</td>
                            <td>{{ $membership->id }}</td>
                            <td>{{ $membership->expired_on }}</td>
                            <td style="justify-content: space-evenly;">
                                <a href="/members/printMembership/{{ $member->id }}" class="btn btn-outline-dark">Print</a>
                            </td>
                            @php
                                $hasActiveMembership = true;
                            @endphp
                        @break
                    @endif
                @endforeach
                @if (!$hasActiveMembership)
                    <td style="justify-content: space-evenly;">
                        <a href="/members/membership/add/{{ $member->id }}"
                            class="btn btn-outline-success">Activate</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif
                <td style="display: flex; justify-content: space-evenly;">
                    <a href="/members/delete/{{ $member->id }}" class="btn btn-outline-danger">Delete</a>
                    <a href="/members/update/{{ $member->id }}" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
</section>
@endsection
