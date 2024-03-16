<?php
namespace App\Console\Commands;

use App\Models\HasilQuery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class AgentSingSing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:agent-sing-sing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $response = Http::get('http://127.0.0.1:8000/api/pegawai/jenis_kelamin');

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            // Mendapatkan data dari respons API
            $data = $response->json();

            // Menyimpan data ke database PostgreSQL
            HasilQuery::on('pgsql')->create([
                'result_name'=>'pegawai by jenis kelamin',
                'query_result' => $data,
            ]);

            // Output pesan ke konsol
            $this->info('Data has been fetched and stored successfully.');
        } else {
            // Output pesan jika permintaan gagal
            $this->error('Failed to fetch data from API.');
        }
    }
}
