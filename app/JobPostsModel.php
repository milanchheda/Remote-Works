<?php

namespace App;

use App\CompanyModel;
use App\JobSourcesModel;
use Spatie\Tags\HasTags;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class JobPostsModel extends Model
{
	use HasSlug, HasTags;

    protected $table = 'job_posts';

	protected $fillable = [
        'title', 'body', 'source_slug', 'created_at', 'updated_at', 'company_id', 'job_source_id', 'published', 'apply_url'
    ];

    public $casts = ['published' => 'boolean'];

    public function scopePublished(Builder $query)
    {
        $query->where('published', true);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function company() {
        return $this->belongsTo(CompanyModel::class, 'company_id', 'id');
    }

    public function jobSources() {
        return $this->belongsTo(JobSourcesModel::class, 'job_source_id', 'id');
    }
}
