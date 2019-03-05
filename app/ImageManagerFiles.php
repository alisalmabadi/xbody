<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Joselfonseca\ImageManager\Interfaces\ImageDbStorageInterface;
use Laracasts\Commander\Events\EventGenerator;
use Joselfonseca\ImageManager\Commands\UploadFile\Events\FileWasSavedToDb;

/**
 * Description of ImageManagerFiles
 *
 * @author desarrollo
 */
class ImageManagerFiles extends Model implements ImageDbStorageInterface {

    protected $table = 'image_manager_files';
    protected $fillable = ['name', 'originalName', 'type', 'path', 'size', 'from_manager'];

    use EventGenerator;

    public function saveFileToDb($file) {
        $f = $this->create($file);
        $f->raise(new FileWasSavedToDb($f));
        return $f;
    }

    public function getFileById($id) {
        return $this->findOrFail($id);
    }

    public function getFileInfo() {
        return [
            'name' => $this->name,
            'originalName' => $this->originalName,
            'type' => $this->type,
            'url' => route('media', $this->id),
            'thumb' => route('showthumb', $this->id),
            'size' => (int) $this->size,
            'date_uploaded' => $this->created_at->format('Y-m-d H:i:s'),
            'urlAll' => route('ImageManagerImages')
        ];
    }

    public function deleteFile() {
        return $this->delete();
    }

	public function products()
	{
		return $this->belongsToMany('App\Product','image_manager_files_product','image_manager_files_id','product_id');

    }
/*
	public function product_values()
	{
		return $this->belongsToMany('App\Product','image_manager_files_product_value','image_manager_files_id','product_value_id');

	}*/
}
