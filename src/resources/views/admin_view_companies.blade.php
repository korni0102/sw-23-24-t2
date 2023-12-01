@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        @if(auth()->user()->role_id==2)
            <table>
                <tr>
                    <td>
                        <form action="{{ route('addCompany') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pridať firmu</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('addContact') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pridať kontakt</button>
                        </form>
                    </td>
                </tr>
            </table>

        @endif

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Firma</th>
                <th scope="col">Adresa</th>
                <th scope="col">Contacts</th>
                <th scope="col">Actions</th>

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
                    
                    <td style="display: flex; flex-direction: row; justify-content: space-around; align-items: center;">
                        <form action="{{ route('companies.edit', $company->id) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>

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
