<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - PT. Maju Bersama</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Inter', 'Segoe UI', Arial, sans-serif}
        body{background:#f8fafc;color:#0f172a}
        .navbar{background:#0f172a;color:#fff;padding:16px 0}
        .navbar-inner{max-width:1100px;margin:0 auto;padding:0 24px;display:flex;justify-content:space-between;align-items:center}
        .logo{font-size:20px;font-weight:800}.logo span{color:#38bdf8}
        .navbar nav a{color:#94a3b8;text-decoration:none;margin-left:20px;font-weight:600;font-size:14px;padding:8px 12px;border-radius:8px}
        .navbar nav a:hover,.navbar nav a.active{background:#1e293b;color:#fff}
        .container{max-width:1100px;margin:28px auto;padding:0 24px}
        .card{background:#fff;padding:24px;border-radius:14px;box-shadow:0 1px 3px rgba(0,0,0,0.08);border:1px solid #e2e8f0}
        .page-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
        .page-head h2{font-size:24px;font-weight:800}
        .page-head p{color:#64748b;font-size:14px;margin-top:4px}
        .btn{display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:14px;border:none;cursor:pointer}
        .btn-primary{background:#2563eb;color:#fff}.btn-primary:hover{background:#1d4ed8}
        .btn-success{background:#16a34a;color:#fff}
        .btn-warning{background:#f59e0b;color:#fff}
        .btn-danger{background:#ef4444;color:#fff}
        .btn-sm{padding:6px 12px;font-size:13px}
        table{width:100%;border-collapse:collapse}
        th{background:#0f172a;color:#fff;text-align:left;padding:13px;font-size:13px;text-transform:uppercase;letter-spacing:.5px}
        th:first-child{border-radius:10px 0 0 0} th:last-child{border-radius:0 10px 0 0}
        td{padding:13px;border-bottom:1px solid #f1f5f9;font-size:14px}
        tr:hover td{background:#f8fafc}
        .aksi{display:flex;gap:8px}
        label{display:block;margin-bottom:6px;font-weight:600;font-size:14px}
        input,select{width:100%;padding:11px 12px;border:1px solid #cbd5e1;border-radius:8px;margin-bottom:16px;font-size:14px;outline:none}
        input:focus,select:focus{border-color:#2563eb;box-shadow:0 0 0 3px #dbeafe}
        .badge{padding:5px 11px;border-radius:20px;font-size:12px;font-weight:700;display:inline-block}
        .badge-success{background:#dcfce7;color:#166534}
        .badge-danger{background:#fee2e2;color:#991b1b}
        .badge-info{background:#dbeafe;color:#1e40af}
        .badge-warning{background:#fef3c7;color:#92400e}
        .alert{background:#dcfce7;color:#166534;padding:12px 15px;border-radius:8px;margin-bottom:16px;font-weight:600}
        .empty{text-align:center;padding:40px;color:#94a3b8}
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="logo">INVENTORY <span>SYSTEM</span></div>
            <nav>
                <a href="/products">Products</a>
                <a href="/stocks">Stocks</a>
                <a href="/transactions">Transactions</a>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">@yield('content')</div>
    </div>
</body>
</html>