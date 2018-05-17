<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\CompanyModel;
use App\JobPostsModel;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class fetchFromRemoteOk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:remoteok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch jobs from remoteok.io';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', 'https://remoteok.io/api');
        $contentType = $response->getHeader('content-type');
        if($response->getStatusCode() === 200 && $contentType[0] === 'application/json') {
            $body = $response->getBody();
            $collection = collect(json_decode($body->getContents(), true));
            $remoteJobsCollection = $collection->map(function ($item, $key) {
                if(isset($item['slug'])) {
                    $companyNameObj = CompanyModel::firstOrCreate(['name' => $item['company']]);
                    $check = JobPostsModel::where('source_slug', $item['slug'])->first(['id']);
                    // print_r($check);
                    if(!isset($check)) {
                        $newJobPost = JobPostsModel::create([
                            'title' => $item['position'],
                            'body' => '',
                            'apply_url' => $item['url'],
                            'source_slug' => $item['slug'],
                            'company_id' => $companyNameObj->id,
                            'job_source_id' => 1,
                            'published' => 1,
                            // 'tags' => $item['tags'],
                            'created_at' => Carbon::createFromTimeStamp($item['epoch']),
                            'updated_at' => Carbon::createFromTimeStamp($item['epoch']),
                        ]);

                        $newJobPost->attachTags($item['tags']);
                    }
                }
            });
        }
    }
}
