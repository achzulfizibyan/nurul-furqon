<?php

namespace App\Services;

use GuzzleHttp\Client;

class XenditService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.xendit.co/',
            'auth' => [env('XENDIT_API_KEY'), ''],
        ]);
    }

    public function createQris($donasi, $donatur)
    {
        $externalId = 'donasi-' . $donasi->id . '-' . uniqid();

        $response = $this->client->post('qr_codes', [
            'json' => [
                'external_id'  => $externalId,
                'amount'       => (int) $donatur->jumlah,
                'type'         => 'DYNAMIC',
                'currency'     => 'IDR',
                'callback_url' => url('/xendit/callback/qris'),
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        // Simpan external_id ke donatur
        $donatur->update(['external_id' => $externalId]);

        return $data;
    }

    public function createEwalletCharge($donasi, $donatur, $ewalletType)
    {
        $externalId = 'donasi-' . $donasi->id . '-' . uniqid();

        $response = $this->client->post('ewallets/charges', [
            'json' => [
                'reference_id' => $externalId,
                'currency'     => 'IDR',
                'amount'       => (int) $donatur->jumlah,
                'checkout_method' => 'ONE_TIME_PAYMENT',
                'channel_code' => $ewalletType, // OVO, DANA, GOPAY, SHOPEEPAY
                'channel_properties' => [
                    'success_redirect_url' => route('client.donasi.success', [$donasi->id, $donatur->id]),
                ],
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        // simpan external_id ke donatur
        $donatur->update(['external_id' => $externalId]);

        return $data;
    }

}