<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class ItemCategory extends Model implements HasMedia
{
    use HasFactory, Filterable, Multitenantable, InteractsWithMedia;

    protected $fillable = [
        'name', 'restaurant_id'
    ];

    protected $appends = [
        'photo'
    ];

    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl();
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
