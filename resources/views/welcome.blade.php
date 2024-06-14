<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque - Accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff !important;
        }
        .navbar-nav .nav-item .nav-link {
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ffc107 !important;
        }
        .navbar-nav .nav-item .nav-link::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background-color: #ffc107;
            transition: width 0.3s ease-in-out;
        }
        .navbar-nav .nav-item .nav-link:hover::after {
            width: 100%;
        }
        
        .jumbotron {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 150px 0;
            margin-bottom: 0;
            min-height: 100vh;
        }
        .jumbotron h1 {
            font-size: 4.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .jumbotron p {
            font-size: 1.4rem;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .feature {
            background-color: #ffffff;
            padding: 100px 0;
            text-align: center;
        }
        .feature h2 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .feature p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 60px 0;
        }
        .footer p {
            margin-bottom: 0;
        }
        .footer ul {
            list-style-type: none;
            padding: 0;
        }
        .footer ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .footer ul li:last-child {
            margin-right: 0;
        }
        .footer ul li a {
            color: #ffffff;
            text-decoration: none;
        }
        .footer ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

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
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Bienvenue à la Bibliothèque</h1>
        <p class="lead">Empruntez vos livres préférés en quelques clics.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('books.index') }}" role="button">Voir les livres</a>
    </div>
</div>

<div class="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Notre Collection</h2>
                <p>Découvrez notre collection diversifiée de livres.</p>
                <p><a class="btn btn-primary" href="#" role="button">Voir plus &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Emprunts Faciles</h2>
                <p>Empruntez et retournez vos livres en toute simplicité.</p>
                <p><a class="btn btn-primary" href="#" role="button">En savoir plus &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Contactez-nous</h2>
                <p>Besoin d'aide ? Contactez-nous dès aujourd'hui.</p>
                <p><a class="btn btn-primary" href="#" role="button">Nous Contacter &raquo;</a></p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Bibliothèque</h3>
                <p>Adresse: 123 Rue des Livres<br>Ville, Pays<br>Téléphone: +123456789<br>Email: info@bibliotheque.com</p>
            </div>
            <div class="col-md-4">
                <h3>Liens rapides</h3>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Livres</a></li>
                    <li><a href="#">Emprunts</a></li>
                    <li><a href="#">Contact</a></li>            
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Réseaux sociaux</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p>&copy; 2024 Bibliothèque. Tous droits réservés.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
