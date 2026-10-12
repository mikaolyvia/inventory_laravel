<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Inventory App') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f9fafb; color: #1f2937; }
        .container { max-width: 1000px; margin: 0 auto; }
        .card { background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-top: 16px; }
        .alert-success { background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
        .alert-danger { background-color: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
        .btn { display: inline-block; padding: 8px 14px; text-decoration: none; border-radius: 4px; font-weight: 500; cursor: pointer; border: none; }
        .btn-primary { background-color: #2563eb; color: #fff; }
        .btn-warning { background-color: #eab308; color: #fff; }
        .btn-danger { background-color: #ef4444; color: #fff; }
        .btn-secondary { background-color: #6b7280; color: #fff; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #e5e7eb; padding: 10px; text-align: left; }
        th { background-color: #f3f4f6; }
        .form-group { margin-bottom: 14px; }
        label { display: block; font-weight: bold; margin-bottom: 4px; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; }
        .is-invalid { border-color: #ef4444; }
        .error-message { color: #ef4444; font-size: 0.85rem; margin-top: 4px; }
        .search-bar { display: flex; gap: 8px; margin-bottom: 16px; }
        .search-bar input, .search-bar select { width: auto; flex-grow: 1; }
        .pagination { display: flex; gap: 6px; margin-top: 16px; list-style: none; padding: 0; }
        .pagination li { display: inline; }
        .pagination a, .pagination span { padding: 6px 12px; border: 1px solid #d1d5db; border-radius: 4px; text-decoration: none; color: #374151; }
        .pagination .active span { background-color: #2563eb; color: white; border-color: #2563eb; }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>