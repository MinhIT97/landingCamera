<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Save booking request from landing page
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'facebook' => 'required|string|max:255',
            'booking_date' => 'required',
            'package' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Detect which subdomain/shop the booking came from
        $host = $request->getHost();
        $mewDomain = env('MEW_CAMERA_DOMAIN', 'mewcamera.gymmap.shop');
        $shop = 'precamera';
        if (str_contains($host, 'mewcamera') || str_contains($host, 'mew.') || $host === $mewDomain) {
            $shop = 'mewcamera';
        }

        $validated['shop'] = $shop;

        Booking::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Đặt lịch thành công!'
        ]);
    }

    // Show login page
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.bookings');
        }
        return view('admin.login');
    }

    // Handle login submit
    public function login(Request $request)
    {
        $password = $request->input('password');
        $adminPassword = env('ADMIN_PASSWORD', 'precamera123');

        if ($password === $adminPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.bookings');
        }

        return back()->withErrors(['password' => 'Mật khẩu không đúng!']);
    }

    // Show booking list dashboard
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $shopFilter = $request->query('shop');
        $query = Booking::orderBy('created_at', 'desc');

        if ($shopFilter === 'precamera' || $shopFilter === 'mewcamera') {
            $query->where('shop', $shopFilter);
        }

        $bookings = $query->get();
        return view('admin.bookings', compact('bookings', 'shopFilter'));
    }

    // Update status
    public function updateStatus($id, Request $request)
    {
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status', 'contacted');
        $booking->save();

        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }

    // Delete booking
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('success', 'Xóa lượt đặt lịch thành công!');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}
