<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function XinChao(){
        echo "hello world";
    }
    public function GetName($ten){
        echo "hello world " .$ten;
        return redirect()->route('MyRoute');
    }
    public function GetURL(Request $request){
        //return $request->path();
        if($request->isMethod('get'))
            echo "phuong thuc get";
        else
            echo "khong phai pt get";
    }

    public function PostForm(Request $request){
        echo $request->input('HoTen');
    }

    public function setCookie() {
        $response = new Response();
        $response->withCookie('KhoaHoc', 'Laravel - Dai', 1); //(ten cookie, gia tri, phut)
        echo "Da set cookie";
        return $response;
    }

    public function getCookie(Request $request) {
        echo "Cookie la:";
        return $request->cookie('KhoaHoc');
    }

    public function postFile(Request $request) {
        if($request->hasFile('myFile')){
            $file = $request->file('myFile');
            if($file->getClientOriginalExtension() == 'jpg'){
                $filename = $file->getClientOriginalName();
                echo $filename;
                $file->move('img', $filename);
            } else {
                echo "Khong phai file jpg";
            }
        } else {
            echo "Chưa có file";
        }
    }

    public function getJson() {
        $array = ['PHP', 'Java', 'Ruby', 'CSS'];
        return response()->json($array);
    }

    public function myView() {
        return view('viewpage.phamdai');
    }

    public function time($t) {
        return view('myView', ['time'=>$t]);
    }

    public function blade($str) {
        $khoahoc = 'Phạm Đại abc111';
        if($str == 'laravel') {
            return view('pages.laravel', ['khoahoc'=>$khoahoc]);
        }
        else if ($str == 'php') {
            return view('pages.php', ['khoahoc'=>$khoahoc]);
        }
    }
}
