<x-layout>
    <x-slot:title>Catégorie introuvable - Mini-CMS</x-slot:title>

    <x-page-header title="Catégorie introuvable" subtitle="Cette catégorie n'existe pas ou a été renommée." />

    <x-alert type="info" title="Que faire ?" class="max-w-2xl">
        Choisissez une catégorie existante dans la liste ci-dessous.
    </x-alert>

    <ul class="mt-6 space-y-2">
        @forelse ($categories as $category)
            <li>
                <a href="{{ route('posts.category', $category) }}" class="font-medium text-indigo-600 hover:underline">
                    {{ $category->name }}
                </a>
            </li>
        @empty
            <li class="text-gray-500">Aucune catégorie pour l'instant.</li>
        @endforelse
    </ul>

    <p class="mt-8">
        <a href="{{ route('home') }}" class="font-medium text-indigo-600 hover:underline">Retour à l'accueil</a>
    </p>
</x-layout>