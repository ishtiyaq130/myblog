<?php

namespace App\Jobs;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class BlogData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public $header;
    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, array $header)
    {
        $this->header = $header;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $blogs) {
            $blogInput = array_combine($this->header, $blogs);

            if ($blogInput === false) {
                // Handle error if array_combine fails
                continue;
            }

            // Handle image storage
            if (isset($blogInput['thumbnail']) && !empty($blogInput['thumbnail'])) {
                // dd($blogInput);
                $imageContent = @file_get_contents($blogInput['thumbnail']);
                if ($imageContent !== false) {
                    $imageName = basename($blogInput['thumbnail']);
                    $storedPath = Storage::put("images/{$imageName}", $imageContent);
                    $blogInput['thumbnail'] = $storedPath;
                } else {
                    // Handle the case where the image content could not be retrieved
                    $blogInput['thumbnail'] = null;
                }
            }

            Blog::create($blogInput);
        }
    }
}

