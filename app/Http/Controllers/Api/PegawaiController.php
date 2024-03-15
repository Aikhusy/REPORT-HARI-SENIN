<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\QueryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PegawaiController extends Controller
{
    //
    public function countPegawaiByJenisKelamin(Request $request)
    {
        $filters = $request->all();
        $query = DB::table('pegawai');
        foreach ($filters as $column => $value) {
            if (Schema::hasColumn('pegawai', $column)) {
                $query->where($column, $value);
            }
        }

        $pegawai = $query->select('jenisKelamin', DB::raw('COUNT(*) as total'))
            ->groupBy('jenisKelamin')
            ->get();

        $result = $pegawai->map(function ($item) {
            return [
                'label' => $item->jenisKelamin,
                'total' => $item->total
            ];
        });

        return response()->json($result);
    }
}
