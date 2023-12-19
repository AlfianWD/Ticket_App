<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Carbon\Carbon;

class NomorAntrianController extends Controller
{
    public function saveNomorAntrian(Request $request) {

        try {
            $nomorAntrian = $request->input('nomorAntrian');
    
            $tanggal = Carbon::now('Asia/Jakarta');

            Antrian::create([
                'nomor_antrian' => $nomorAntrian,
                'tanggal' => $tanggal,
            ]);
    
            return response()->json(['status' => 'success', 'message' => "nomor antrian berhasil disimpan"]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
