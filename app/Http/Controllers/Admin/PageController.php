<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library\Helper;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

use App\Page;

class PageController extends Controller
{
    CONST LIMIT = 20;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 13-12-2015
     */
    public function getIndex()
    {
        $pages = Page::whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate($this::LIMIT);
        return View('admins.pages.index', compact('pages'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getCreate()
    {
        return View('admins.pages.create', compact('groups'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postCreate()
    {
        $input = array(
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        );

        $valid = array(
           'title' => 'required',
           'content' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $page = new Page();
        $page->title = Input::get('title');
        $page->slug = Helper::slug($page, $page->title);
        $page->description = Input::get('description');
        $page->content = Input::get('content');
        $page->status = Input::get('status');

        if($page->save()) {
            return Redirect::route('admin.page.detail', $page->id)->with('flashSuccess', 'Thêm bài viết thành công.');
        }else {
            return Redirect::back()->with('flashError', 'Đã xảy ra lỗi, vui lòng thử lại.');
        }
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getEdit($id) {
        $page = Page::getPageByID($id);
        return View('admins.pages.edit', compact('page'));
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postEdit($id) {
        $input = array(
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        );

        $valid = array(
           'title' => 'required',
           'content' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $page = Page::getPageByID($id);
        $page->title = Input::get('title');
        $page->description = Input::get('description');
        $page->content = Input::get('content');
        $page->status = Input::get('status');

        if($page->save()) {
            return Redirect::route('admin.page.detail', $page->id)->with('flashSuccess', 'Cập bài trang thành công.');
        }else {
            return Redirect::back()->with('flashError', 'Đã xảy ra lỗi, vui lòng thử lại.');
        }
    }

    /**
     * Show detail a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getDetail($id) {
        $page = Page::getPageByID($id);
        return View('admins.pages.detail', compact('page'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $page = Page::getPageByID($id);
            if(!empty($page)) {
                $page->deleted_at = date('Y-m-d H:i:s', time());
                if($page->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Trang đã được xóa thành công.'
                    ]);
                }else {
                    return response()->json([
                        'status' => false,
                        'message'=> 'Đã xảy ra lỗi, vui lòng thử lại.'
                    ], 500);
                }
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'Trang không tồn tại trong hệ thống. Vui lòng thử lại.'
                    ], 500);
            }
        }
    }

    /**
    * Delete a resource.
    * @Author: Vu Nguyen
    * @Created: 14-12-2015
    */
    public function getDelete($id) {
        $page = Page::getPageByID($id);
        if(!empty($page)) {
            $page->deleted_at = date('Y-m-d H:i:s', time());
            if($page->save()) {
                return Redirect::route('admin.pages')->with('flashSuccess', 'Trang đã được xóa thành công.');
            }else {
                return Redirect::route('admin.page.detail', $page->id)->with('flashError', 'Đã xảy ra lỗi, vui lòng thử lại.');
            }
        }else {
            return Redirect::route('admin.pages')->with('flashError', 'Trang không tồn tại trong hệ thống. Vui lòng thử lại.');
        }
    }

    /**
     * Delete all resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postDeleteAll() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $checkboxes = Input::get('id');
            $ok = true;
            foreach ($checkboxes as $id) {
                $page = Page::getPageByID($id);
                $page->deleted_at = date('Y-m-d H:i:s', time());
                if(!$page->save()) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'Các trang đã được xóa thành công.'
                ]);
            }else {
                return response()->json([
                    'status' => false,
                    'message'=> 'Đã xảy ra lỗi, vui lòng thử lại.'
                ], 500);
            }
        }
    }

    /**
     * Change status of resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postChangeStatus($id) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $page = Page::getPageByID($id);
            if(!empty($page)) {
                $page->status = $page->status == 0 ? 1 : 0;
                if($page->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Trạng thái của trang đã được cập nhật thành công.'
                    ]);
                }else {
                    return response()->json([
                        'status' => false,
                        'message'=> 'Đã xảy ra lỗi, vui lòng thử lại.'
                    ], 500);
                }
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'Trang không tồn tại trong hệ thống. Vui lòng thử lại.'
                    ], 500);
            }
        }
    }
}
