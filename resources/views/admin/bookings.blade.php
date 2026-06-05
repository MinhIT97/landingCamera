<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đặt Lịch | Pre Camera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #070708;
            --bg-card: #121214;
            --primary-gold: #e8a815;
            --primary-gold-hover: #f7bd33;
            --text-white: #ffffff;
            --text-gray: #9ba1a6;
            --border-color: #222226;
            --success-color: #00cc66;
            --danger-color: #ff3344;
            --font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: var(--font-family);
            padding: 40px 20px;
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 20px;
        }
        .title-box h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary-gold);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .stats {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        .stat-item {
            font-size: 13px;
            color: var(--text-gray);
        }
        .stat-item strong {
            color: var(--text-white);
        }
        .btn-logout {
            background-color: transparent;
            color: var(--text-gray);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 8px 16px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-logout:hover {
            color: var(--danger-color);
            border-color: var(--danger-color);
        }
        .bookings-table-wrapper {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .bookings-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        .bookings-table th {
            background-color: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid var(--border-color);
            padding: 16px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-gray);
        }
        .bookings-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 13px;
            line-height: 1.5;
            vertical-align: top;
        }
        .bookings-table tr:last-child td {
            border-bottom: none;
        }
        .bookings-table tr:hover {
            background-color: rgba(255, 255, 255, 0.01);
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .badge.new {
            background-color: rgba(232, 168, 21, 0.1);
            color: var(--primary-gold);
            border: 1px solid rgba(232, 168, 21, 0.2);
        }
        .badge.contacted {
            background-color: rgba(0, 204, 102, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(0, 204, 102, 0.2);
        }
        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-contact {
            background-color: var(--primary-gold);
            color: #000000;
        }
        .btn-contact:hover {
            background-color: var(--primary-gold-hover);
        }
        .btn-delete {
            background-color: rgba(255, 51, 68, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(255, 51, 68, 0.2);
            margin-left: 8px;
        }
        .btn-delete:hover {
            background-color: var(--danger-color);
            color: #ffffff;
        }
        .facebook-link {
            color: var(--primary-gold);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .facebook-link:hover {
            text-decoration: underline;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: var(--text-gray);
            font-size: 14px;
        }
        .alert-success {
            background-color: rgba(0, 204, 102, 0.1);
            border: 1px solid rgba(0, 204, 102, 0.2);
            color: var(--success-color);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="admin-container">
        
        <!-- Header -->
        <div class="header">
            <div class="title-box">
                <h1><i class="fa-solid fa-database"></i> Quản lý Đặt Lịch Thuê Máy</h1>
                <div class="stats">
                    <div class="stat-item">Tổng lượt đặt: <strong>{{ count($bookings) }}</strong></div>
                    <div class="stat-item">Chưa xử lý: <strong>{{ count($bookings->where('status', 'new')) }}</strong></div>
                </div>
            </div>
            
            <a href="{{ route('admin.logout') }}" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Bookings List Table -->
        <div class="bookings-table-wrapper">
            @if(count($bookings) > 0)
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th>Thời gian gửi</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Facebook</th>
                            <th>Thiết bị thuê</th>
                            <th>Ngày & Giờ nhận máy</th>
                            <th>Lời nhắn</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>
                                    {{ $booking->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}
                                </td>
                                <td><strong>{{ $booking->name }}</strong></td>
                                <td>
                                    <a href="tel:{{ $booking->phone }}" style="color: inherit; text-decoration: none;">
                                        <strong>{{ $booking->phone }}</strong>
                                    </a>
                                </td>
                                <td>
                                    @php
                                        $fbUrl = $booking->facebook;
                                        if (!str_starts_with($fbUrl, 'http://') && !str_starts_with($fbUrl, 'https://')) {
                                            $fbUrl = 'https://' . $fbUrl;
                                        }
                                    @endphp
                                    <a href="{{ $fbUrl }}" target="_blank" class="facebook-link">
                                        <i class="fa-brands fa-facebook"></i> Link Facebook
                                    </a>
                                </td>
                                <td>
                                    <span style="color: var(--primary-gold); font-weight: 700;">
                                        {{ $booking->package }}
                                    </span>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i', strtotime($booking->booking_date)) }}
                                </td>
                                <td style="max-width: 250px; font-style: italic; color: var(--text-gray);">
                                    {{ $booking->message ?? 'Không có' }}
                                </td>
                                <td>
                                    @if($booking->status === 'new')
                                        <span class="badge new">Chưa xử lý</span>
                                    @else
                                        <span class="badge contacted">Đã liên hệ</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display: flex;">
                                        @if($booking->status === 'new')
                                            <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="contacted">
                                                <button type="submit" class="btn-action btn-contact">
                                                    Đã liên hệ
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.bookings.delete', $booking->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lượt đặt này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <i class="fa-regular fa-folder-open" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                    Chưa có lượt đặt lịch nào trong hệ thống.
                </div>
            @endif
        </div>

    </div>

</body>
</html>
