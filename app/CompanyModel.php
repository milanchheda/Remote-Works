<?php

namespace App;

use App\JobPostsModel;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{

	use HasSlug;
    protected $table = 'company';

	protected $fillable = [
        'name', 'address', 'url', 'slug'
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPostsModel::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
