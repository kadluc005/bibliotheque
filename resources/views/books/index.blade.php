<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homme') }}">Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('homme') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrows.index') }}">Emprunts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="d-flex justify-content-center mt-3">
        <form class="d-flex" action="{{ route('books.search') }}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Rechercher" aria-label="Search" style="width: 300px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Rechercher</button>
        </form>
    </div>



    <div class="container mt-5">
        <h1 class="mb-4">Liste des Livres</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($books as $book)
            <div class="col">
                <div class="card h-100">
                    <img src="data:image/{{ $book->image_mime }};base64,{{ base64_encode($book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Auteur : {{ $book->author }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 bg-dark text-white text-center">
        <div class="container p-4">
            <h5 class="mb-4">Bibliothèque</h5>
            <p>Adresse: 123 Rue des Livres<br>Ville, Pays<br>Téléphone: +123456789<br>Email: info@bibliotheque.com</p>
            <div class="social-icons mt-4">
                <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; 2024 Bibliothèque. Tous droits réservés.
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
