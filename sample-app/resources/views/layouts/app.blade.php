<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ticket Management')</title>
    <style>
        /* Some basic styling */
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        header, footer { padding: 1rem; background-color: #f5f5f5; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <header>
        <h1>Ticket Management System</h1>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <small>&copy; {{ date('Y') }} Ticket Management</small>
    </footer>
</body>
</html>