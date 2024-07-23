<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Jobs\BlogData;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;


class Storecsv extends Component
{
    use WithFileUploads;

    public $csv;
    public $data = [];
    public $header = [];

    public function render()
    {
        return view('livewire.storecsv');
    }

    public function save()
    {
        if ($this->csv) {
            $filePath = $this->csv->getRealPath();
            $csv = file($filePath);

            // Debugging step to ensure $csv is an array
            if (!is_array($csv)) {
                dd('CSV file read error: ', $csv);
            }

            $chunks = array_chunk($csv, 10);
            $batch = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                // Debugging step to ensure $data is an array and has the expected structure
                if (!is_array($data)) {
                    dd('Chunk data error: ', $data);
                }

                if ($key == 0) {
                    $this->header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new BlogData($data, $this->header));
            }

            session()->flash('message', 'CSV data is being processed.');
        } else {
            session()->flash('error', 'No CSV file provided.');
        }
    }

    public function export(){
        // dd('hellow');
        $fileName = 'data.csv';

        $callback = function() {
            $file = fopen('php://output', 'w');
            $columns = ['blog_id', 'user_id', 'category_id', 'title', 'thumbnail','content','status']; // Add your column names here

            fputcsv($file, $columns);

            $data = DB::table('blog')->get();

            foreach ($data as $row) {
                fputcsv($file, (array) $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
