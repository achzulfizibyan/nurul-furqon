<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Donatur;
use App\Services\XenditService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Donasi $donasi, Donatur $donatur, XenditService $xendit)
    {
        // Generate QRIS dari Xendit
        $qris = $xendit->createQris($donasi, $donatur);

        // Kirim ke view
        return view('client.menu.donasi.payment', compact('donasi', 'donatur', 'qris'));
    }

    // Callback untuk notifikasi pembayaran dari Xendit
    public function callback(\Illuminate\Http\Request $request)
    {
        $payload = $request->all();

        // contoh: update status donasi jika SUCCEEDED
        if (($payload['status'] ?? null) === 'SUCCEEDED') {
            $externalId = $payload['external_id'] ?? null;
            if ($externalId) {
                $donatur = Donatur::where('external_id', $externalId)->first();
                if ($donatur) {
                    $donatur->update(['status' => 'paid']);
                    // kirim notif WA ke admin di sini
                }
            }
        }

        return response()->json(['success' => true]);
    }

    public function payWithEwallet(Donasi $donasi, Donatur $donatur, Request $request, XenditService $xendit)
    {
        $ewalletType = $request->input('ewallet'); // misalnya 'OVO', 'DANA', 'GOPAY', 'SHOPEEPAY'
        $charge = $xendit->createEwalletCharge($donasi, $donatur, $ewalletType);

        // Redirect ke checkout URL dari Xendit
        return redirect($charge['actions']['desktop_web_checkout_url']);
    }

}