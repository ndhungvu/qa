<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    /*
    * This is function get all groups is active
    */
    public static function getAll() {
    	return Page::whereNull('deleted_at')->get();
    }

    public static function getPageByID($id) {
        return Page::where('id', $id)->whereNull('deleted_at')->first();
    }

    public static function getPageBySlug($slug) {
        return Page::where('slug', $slug)->whereNull('deleted_at')->first();
    }

    public static function getPages($limit = 4, $offset = 0) {
        return Page::where('status', Page::ACTIVE)->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')->limit($limit)->offset($offset)->get();
    }

    public static function getTopPages($limit = 5) {
        return Page::where('status', Page::ACTIVE)->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')->limit($limit)->offset(0)->get();
    }

    public static function getTagsArtiles($id) {
        $related_Pages = Page::select('Pages.*')
                            ->join('Page_tag','Pages.id','=','Page_tag.Page_id')
                            ->join('tags','tags.id','=','Page_tag.tag_id')
                            ->whereNull('Pages.deleted_at')->whereNull('tags.deleted_at')
                            ->where('Pages.id',$id)->orderBy('Pages.created_at','DESC')->get();

        return $related_Pages;
    }
}
