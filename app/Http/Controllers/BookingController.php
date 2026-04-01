<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Appointment;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('customer')
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->paginate(10);
        return view('bookings.index', compact('appointments'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(BookingRequest $request)
    {
        // Check if time slot is available
        $exists = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->where('status', 'active')
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->with('error', 'Khung giờ này đã có người đặt! Vui lòng chọn khung giờ khác.')
                ->withInput();
        }

        // Create or get customer
        $customer = Customer::firstOrCreate(
            ['name' => $request->customer_name],
            ['phone' => $request->phone]
        );

        Appointment::create([
            'customer_id' => $customer->id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'active',
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Đặt lịch thành công!');
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->status === 'cancelled') {
            return redirect()->back()
                ->with('error', 'Lịch đã được hủy trước đó!');
        }

        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('bookings.index')
            ->with('success', 'Hủy lịch thành công!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('bookings.index')
            ->with('success', 'Xóa lịch thành công!');
    }
}