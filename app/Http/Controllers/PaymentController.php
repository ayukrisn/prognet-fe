<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function beliTiket(Request $request, $eventId)
    {
        // Validasi request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Dapatkan event berdasarkan ID
        $event = Event::findOrFail($eventId);

        // Harga per tiket dari event
        $hargaPerTiket = $event->price;

        // Hitung total harga
        $totalHarga = $request->input('quantity') * $hargaPerTiket;

        // Simpan pembelian tiket ke dalam tabel payments
        $payment = new Payment([
            'user_id' => auth()->id(), // Ambil ID pengguna yang sedang login
            'event_id' => $eventId,
            'quantity' => $request->input('quantity'),
            'total_harga' => $totalHarga,
        ]);

        $payment->save();

        // Response atau redirect sesuai kebutuhan Anda
        return view('UserDashboard');
    }
}
