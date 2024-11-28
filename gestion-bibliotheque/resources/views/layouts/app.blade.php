<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Bibliothèque')</title>
    <style>
        /* Style de base pour le corps */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #333;
        }

        /* Style pour l'en-tête et la navigation */
        header {
            background-color: skyblue;
            padding: 1rem;
        }
        nav {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }
        nav a {
            margin-top: 2rem;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }
        nav a:hover {
            text-decoration: underline;
            color: red;
        }

        /* Style pour le titre de la page */
        h1 {
            text-align: center;
            margin-top: 2rem;
            color: red;
            font-size: 40px;
        }

        /* Style pour le formulaire de recherche */
        form {
            /* display: flex; */
            justify-content: center;
            margin-top: 2rem;
        }
        form input[type="text"] {
            padding: 0.5rem;
            margin: 1rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }
        form button {
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: translate(1,1);
        }

        /* Style du contenu principal */
        main {
            margin: 2rem;
        }

        /* Footer (si tu en ajoutes un plus tard) */
        /* footer {
            text-align: center;
            padding: 1rem;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        } */
        main {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 20px;
            padding: 20px;
        }
        main div {
            background-color: background-color: rgba(50, 50, 50, 0.7);
            ;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        button {
            padding: 40px 20px;
            margin: 1.5rem;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: blue;
        }
        .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    .book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.book-item {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 200px;
}

.book-item img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

.carousel-container {
    position: relative;
    width: 50%;
    margin: auto;
    overflow: hidden;
}

.carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-item {
    min-width: 100%;
    box-sizing: border-box;
    text-align: center;
}

.carousel-item img {
    width: 100%;
    height: auto;
}

.carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 10px;
    border-radius: 5px;
}

.prev-btn, .next-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.prev-btn {
    left: 10px;
}

.next-btn {
    right: 10px;
}

.prev-btn:hover, .next-btn:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
      
    </style>
</head>
<body>
    <h1>librairie "COGITO ERGO SUM"</h1>
<header>
    <nav>
        <a href="{{ route('books.accueil') }}">Accueil</a>
        <a href="{{ route('contact.showForm') }}">Contacter Nous</a>
        <a href="{{ route('messages.index') }}">Messages</a>
        <form action="{{ route('books.search') }}" method="GET" style="margin-bottom: 20px;">
          <input type="text" name="query" placeholder="Rechercher par titre, auteur ou année" value="{{ request()->get('info') }}">
          <button type="submit">Rechercher</button>
        </form>

    </nav>
</header>
<main>
  <aside>
    
    <div>
    <a href="{{ route('books.index') }}">
    <button>liste des livres</button>
    </a>
    </div>
    <div>
    <a href="{{ route('books.create') }}">
    <button>Ajouter un livre</button>
    </a>
    </div>
    <div>
    <a href="{{ route('books.recent') }}">
    <button>nouveauté</button>
    </a>
    </div>
  </aside>
  <section>
  @yield('content')
    <div>
    

    </div>
</section>


</main>

<script>
    let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlide(index) {
    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }
    
    const offset = -currentSlide * 100; // Calcul de la translation
    document.querySelector('.carousel').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

// Auto-défilement (optionnel)
setInterval(() => {
    nextSlide();
}, 5000); // Change de slide toutes les 5 secondes

</script>

</body>
</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Bibliothèque')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('livres.index') }}">Accueil</a>
            <a href="{{ route('livres.create') }}">Ajouter un Livre</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 - Gestion de Bibliothèque</p>
    </footer>
</body>
</html> -->
