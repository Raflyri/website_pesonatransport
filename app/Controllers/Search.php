<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FleetModel;

class Search extends BaseController
{
    protected $fleetModel;

    public function __construct()
    {
        $this->fleetModel = new FleetModel();
    }

    public function index()
    {
        // 1. Ambil Data Input
        $tipeLayanan = $this->request->getGet('tipe_layanan'); // 'sopir' atau 'lepaskunci'
        $startDate   = $this->request->getGet('start_date');
        $endDate     = $this->request->getGet('end_date');

        // Lokasi (Hanya diambil jika mode sopir, jika lepas kunci kita set strip saja)
        $pickup  = $this->request->getGet('pickup_location') ?? '-';
        $dropoff = $this->request->getGet('dropoff_location') ?? '-';

        // Data Jarak (Opsional)
        $distanceKm   = $this->request->getGet('distance_km');
        $distanceText = $this->request->getGet('distance_text');

        // Validasi Tanggal
        if (!$startDate || !$endDate) {
            return redirect()->back()->with('error', 'Tanggal sewa harus diisi!');
        }

        // 2. Kalkulasi Durasi (Hari)
        $start = new \DateTime($startDate);
        $end   = new \DateTime($endDate);
        $interval  = $start->diff($end);
        $totalDays = $interval->d;

        // Jika ada kelebihan jam/menit, bulatkan ke atas jadi 1 hari tambahan
        if ($interval->h > 0 || ($totalDays == 0 && $interval->i > 0)) {
            $totalDays++;
        }
        $duration = max(1, $totalDays); // Minimal 1 hari

        // 3. Setup Query Database
        //$model = $this->fleetModel->where('is_available', 1);
        $model = $this->fleetModel;

        if ($tipeLayanan == 'lepaskunci') {
            // Cari mobil yang support 'Lepas Kunci' atau 'Keduanya'
            $model->groupStart()
                ->where('rental_service', 'Lepas Kunci')
                ->orWhere('rental_service', 'Keduanya')
                ->groupEnd();
        } else {
            // Cari mobil yang support 'Dengan Supir' atau 'Keduanya'
            $model->groupStart()
                ->where('rental_service', 'Dengan Supir')
                ->orWhere('rental_service', 'Keduanya')
                ->groupEnd();
        }

        //$fleets = $model->findAll();
        $fleets = $model->paginate(6);
        // Ambil object Pager untuk dikirim ke view
        $pager = $model->pager;
        $results = [];
        $driverFeePerDay = 250000; // Harga Supir (Hardcode sementara)

        // 4. Looping & Hitung Harga
        foreach ($fleets as $fleet) {
            $pricePerDay = $fleet['price_per_day'];
            $carCost     = $pricePerDay * $duration;

            if ($tipeLayanan == 'lepaskunci') {
                // RUMUS: (Harga x Hari) + Deposit 1 Hari
                $driverCost = 0;
                $deposit    = $pricePerDay; // Deposit sebesar 1 hari sewa
                $totalPrice = $carCost + $deposit;
            } else {
                // RUMUS: (Harga x Hari) + (Supir x Hari)
                $driverCost = $driverFeePerDay * $duration;
                $deposit    = 0;
                $totalPrice = $carCost + $driverCost;
            }

            // Simpan hasil hitungan ke array fleet untuk dikirim ke View
            $fleet['calc_duration']    = $duration;
            $fleet['calc_car_fee']     = $carCost;
            $fleet['calc_driver_fee']  = $driverCost;
            $fleet['calc_deposit']     = $deposit;     // Data baru
            $fleet['calc_total_price'] = $totalPrice;

            // Simpan info jarak (kalau ada)
            $fleet['trip_distance']    = $distanceText;

            $results[] = $fleet;
        }

        $data = [
            'title' => 'Hasil Pencarian',
            'fleets' => $results,
            'pager' => $pager,
            'searchParams' => [
                'tipe_layanan' => $tipeLayanan,
                'pickup'       => $pickup,
                'dropoff'      => $dropoff,
                'start'        => $startDate,
                'end'          => $endDate,
                'duration'     => $duration
            ]
        ];

        return view('pages/search_results', $data);
    }
}
