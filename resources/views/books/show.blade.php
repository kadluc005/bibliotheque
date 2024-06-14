<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Livre</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .book-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .book-image {
            max-width: 100%;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-borrow {
            background-color: #6c757d;
            border: none;
        }
        .btn-borrow:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="book-container">
        <div class="row">
            <div class="col-md-6">
                <img src="data:image/{{ $book->image_mime }};base64,{{ base64_encode($book->image) }}" class="img-fluid book-image" alt="{{ $book->title }}">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-between">
                <div>
                    <h1>{{ $book->title }}</h1>
                    <p>Auteur : {{ $book->author }}</p>
                    <p><strong>Résumé :</strong> {{ $book->resume }}</p>
                    <p>{{ $book->description }}</p>
                </div>
                <div class="text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-lg btn-borrow" data-bs-toggle="modal" data-bs-target="#borrowModal">
                        Emprunter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Borrow Modal -->
    <div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrowModalLabel">Formulaire d'emprunt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('borrow.book', ['id' => $book->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="borrowDate" class="form-label">Date d'emprunt</label>
                            <input type="date" class="form-control" id="borrowDate" name="borrow_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="returnDate" class="form-label">Date de retour</label>
                            <input type="date" class="form-control" id="returnDate" name="return_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
