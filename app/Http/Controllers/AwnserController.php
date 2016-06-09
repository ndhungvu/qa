<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\Banner;
use App\Channel;
use App\Stream;
use App\Article;
use App\Video;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $banners = Banner::getBanners(5,0);
        $channels = Channel::getChannels(15,0);
        $streams = Stream::getStreams(50,0);
        $articles = Article::getArticles(4,0);
        $videos = Video::getVideos(8,0);
        $highlight_channels = Stream::getHighlightChannels(5);

        /*Sidebar Right*/
        $top_streams = Stream::getStreams(3);
        $top_articles = Article::getTopArticles(5);
        $top_videos = Video::getTopVideos(5);
        $tags = Tag::getTags(10,0);

        return View('homes.index', compact('banners','channels','streams','articles','videos',
            'highlight_channels','top_streams', 'top_articles', 'top_videos', 'tags'));
    }
}
