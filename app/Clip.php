<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class Clip
 *
 * @package App
 * @property string $title
 * @property string $video
 * @property tinyInteger $ad_enabled
 * @property integer $total_impressions
 * @property string $recommended_frequency
 * @property string $ad_airing_date_first
 * @property string $ad_airing_date_last
 * @property string $brand
 * @property string $industry
 * @property string $advertiser
 * @property string $product
 * @property text $description
 * @property text $notes
 * @property string $agency
 * @property string $sourceurl
 * @property string $imagespath
 * @property string $cai_path
 * @property string $caipyurl
 * @property string $isci_ad_id
 * @property string $copylength
 * @property string $media_content
 * @property string $media_filename
 * @property string $scheduledate
 * @property string $expirationdate
 * @property string $family
 * @property string $subfamily
 * @property string $group
 * @property string $caipy_clipids
 * @property string $reviewstate
 * @property tinyInteger $ignoreimport
*/
class Clip extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['title', 'video', 'ad_enabled', 'total_impressions', 'recommended_frequency', 'ad_airing_date_first', 'ad_airing_date_last', 'advertiser', 'product', 'description', 'notes', 'agency', 'sourceurl', 'imagespath', 'cai_path', 'caipyurl', 'isci_ad_id', 'copylength', 'media_content', 'media_filename', 'scheduledate', 'expirationdate', 'family', 'subfamily', 'group', 'caipy_clipids', 'reviewstate', 'ignoreimport', 'brand_id', 'industry_id'];
    protected $hidden = [];
    public static $searchable = [
        'isci_ad_id',
        'scheduledate',
    ];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalImpressionsAttribute($input)
    {
        $this->attributes['total_impressions'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAdAiringDateFirstAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['ad_airing_date_first'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['ad_airing_date_first'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAdAiringDateFirstAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAdAiringDateLastAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['ad_airing_date_last'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['ad_airing_date_last'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAdAiringDateLastAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBrandIdAttribute($input)
    {
        $this->attributes['brand_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setIndustryIdAttribute($input)
    {
        $this->attributes['industry_id'] = $input ? $input : null;
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
    
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id')->withTrashed();
    }
    
    public function industries() {
        return $this->hasMany(Industry::class, 'clip_id');
    }
    public function brands() {
        return $this->hasMany(Brand::class, 'clip_id');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('icons')
            ->width(100)
            ->height(32)
            ->sharpen(10);

        $this->addMediaCollection('images');

        $this->addMediaCollection('videos')->singleFile()->useDisk('videos')
            ->registerMediaConversions(function(Media $media){
                $this->addMediaConversion('videos')
                    ->width(560)
                    ->height(315)
                    ->extractVideoFrameAtSecond(2)
                    ->extractVideoFrameAtSecond(20)
                    ->extractVideoFrameAtSecond(30)
                    ->performOnCollections('videos');
            });
    }
}
