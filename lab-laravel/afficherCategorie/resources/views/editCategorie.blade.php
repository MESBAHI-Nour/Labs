<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
</head>
<body>
    <main>
        <h1>Modifier la catégorie</h1>

        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nom">Nom</label>
                <input id="nom" name="nom" type="text" value="{{ old('nom', $categorie->nom) }}" required maxlength="255">
                @error('nom')
                    <p role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $categorie->description) }}</textarea>
                @error('description')
                    <p role="alert">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Enregistrer les modifications</button>
        </form>

        <p><a href="{{ route('categories') }}">Retour à la liste</a></p>
    </main>
</body>
</html>
