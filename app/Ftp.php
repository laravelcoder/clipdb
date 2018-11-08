<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ftp
 *
 * @package App
 * @property string $ftp_server
 * @property string $ftp_directory
 * @property string $ftp_username
 * @property string $ftp_password
 * @property string $notes
*/
class Ftp extends Model
{
    use SoftDeletes;

    protected $fillable = ['ftp_server', 'ftp_directory', 'ftp_username', 'ftp_password', 'notes'];
    protected $hidden = ['ftp_password'];
    public static $searchable = [
    ];
    /**
     * Hash password
     * @param $input
     */
    public function setFtpPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['ftp_password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
}
