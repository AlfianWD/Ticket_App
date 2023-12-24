<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Antrian;
use Carbon\Carbon;

class NomorAntrianController extends Controller
{
    public function view() {
        $formattedDate = Carbon::now('Asia/Jakarta');

        $nomor = Antrian::whereDate('tanggal', $formattedDate)->paginate(10);

        $totalAntrian = Antrian::whereDate('tanggal', $formattedDate)->count();

        $antrianSekarang = Antrian::orderBy('nomor_antrian')->firstOrNew(['nomor_antrian' => 0]);

        $antrianSelanjutnya = Antrian::orderBy('nomor_antrian')->firstOrNew(['nomor_antrian' => 0]);

        $sisaAntrian = $totalAntrian - ($antrianSekarang ? $antrianSekarang->nomor_antrian : 0);


        return view(
            'dashboard/dashboard', 
            
            compact(
                'nomor', 
                'totalAntrian', 
                'antrianSekarang', 
                'antrianSelanjutnya', 
                'sisaAntrian'
            ));
    } 

    public function getTotalAntrian()
    {
        try {
            $formattedDate = Carbon::now('Asia/Jakarta');
            $totalAntrian = Antrian::whereDate('tanggal', $formattedDate)->count();

            return response()->json(['totalAntrian' => $totalAntrian]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

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

    public function saveDataNomorAntrian(Request $request) {
        $formattedDate = Carbon::now('Asia/Jakarta');

        $totalAntrian = Antrian::whereDate('tanggal', $formattedDate)->count();

        $antrianSekarang = Antrian::whereDate('tanggal', $formattedDate)
        ->orderBy('nomor_antrian')
        ->first();
       
        $antrianSelanjutnya = Antrian::whereDate('tanggal', $formattedDate)
        ->where('nomor_antrian', '>', $antrianSekarang->nomor_antrian)
        ->orderBy('nomor_antrian')
        ->first();

        $sisaAntrian = $totalAntrian - ($antrianSekarang ? $antrianSekarang->nomor_antrian : 0);

        return response()->json([
            'antrianSekarang' => $antrianSekarang,
            'antrianSelanjutnya' => $antrianSelanjutnya,
            'sisaAntrian' => $sisaAntrian,
        ]);
    }
}
