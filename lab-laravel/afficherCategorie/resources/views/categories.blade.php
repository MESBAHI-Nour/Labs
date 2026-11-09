<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
</head>
<body>
    <main>
        <h1>Liste des catégories</h1>

        @if (session('success'))
            <p role="status">{{ session('success') }}</p>
        @endif

        <p><a href="{{ route('categories.create') }}">Ajouter une catégorie</a></p>

        @if ($categories->isEmpty())
            <p>Aucune catégorie n'a encore été ajoutée.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->nom }}</td>
                            <td>{{ $categorie->description ?: 'Aucune description' }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $categorie->id) }}">Modifier</a>
                                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>
</body>
</html>