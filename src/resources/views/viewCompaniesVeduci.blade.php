@extends('navbar.navbar')

@section('body')
    @if (auth()->user())


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Firma</th>
                <th scope="col">Adresa</th>
                <th scope="col">Contacts</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <button class="btn btn-dark" onclick="toggleContacts({{ $company->id }})"
                            {{ $company->contacts->isEmpty() ? 'disabled' : '' }}>
                            View Contacts
                        </button>
                    </td>
                </tr>
                <tr id="contacts_{{ $company->id }}" style="display: none;">
                    <td colspan="4">
                        <table class="table table-dark mb-0">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Tel</th>
                                <th>E-mail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($company->contacts as $contact)
                                <tr>
                                    <td>{{ $contact->firstname }}</td>
                                    <td>{{ $contact->lastname }}</td>
                                    <td>{{ $contact->tel }}</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function toggleContacts(companyId) {
                var contactsInfo = document.getElementById('contacts_' + companyId);
                if (contactsInfo.style.display === "none") {
                    contactsInfo.style.display = "table-row";
                } else {
                    contactsInfo.style.display = "none";
                }
            }
        </script>
    @endif
@endsection
