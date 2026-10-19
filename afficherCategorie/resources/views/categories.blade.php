<ul>
    @foreach ($categories as $categorie)
        <li>{{ $categorie->nom }} - {{ $categorie->description }}</li>
    @endforeach
</ul>