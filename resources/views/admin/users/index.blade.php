<x-layout>
    <x-slot:title>Utilisateurs - Mini-CMS</x-slot:title>

    <x-page-header title="Utilisateurs" subtitle="Promouvoir un auteur ou rétrograder un administrateur." />

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-gray-200 text-gray-600">
                <tr>
                    <th scope="col" class="py-2 pr-4 font-medium">Nom</th>
                    <th scope="col" class="py-2 pr-4 font-medium">E-mail</th>
                    <th scope="col" class="py-2 pr-4 font-medium">Rôle</th>
                    <th scope="col" class="py-2 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b border-gray-100 align-top">
                        <td class="py-3 pr-4 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="py-3 pr-4 text-gray-600">{{ $user->email }}</td>
                        <td class="py-3 pr-4 text-gray-600">{{ $user->role }}</td>
                        <td class="py-3">
                            @if ($user->is(auth()->user()))
                                <span class="text-sm text-gray-500">Votre compte</span>
                            @else
                                <form method="POST" action="{{ route('admin.users.role', $user) }}">
                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="role" value="{{ $user->isAdmin() ? 'author' : 'admin' }}">

                                    <button type="submit" class="{{ $user->isAdmin() ? 'border-red-600 text-red-700 hover:bg-red-50' : 'border-indigo-600 text-indigo-600 hover:bg-indigo-50' }} rounded-md border px-4 py-2 text-sm font-medium">
                                        {{ $user->isAdmin() ? 'Rétrograder' : 'Promouvoir' }}
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>