<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

 $request_type =$_REQUEST['r'] ??'';
 if($request_type=='blogs_list'){
    blogs_list();
 }

 if($request_type=='blogs_detail'){
    blogs_detail();
 }

 function getBlogs()
     {
         $array = [
             [
                 "heading" => "ABC Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=52",
                 "id" => 1,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "CDE Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=53",
                 "id" => 2,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
 
             ],
             [
                 "heading" => "FGH Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=54",
                 "id" => 3,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "JKL Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=55",
                 "id" => 4,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "LMN Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=56",
                 "id" => 5,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "OPQ Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=57",
                 "id" => 6,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "QRS Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=58",
                 "id" => 7,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "TUV Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=59",
                 "id" => 8,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "WXY Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=60",
                 "id" => 9,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ],
             [
                 "heading" => "ZZZ Blog123",
                 "image" => "https://picsum.photos/1024/480/?image=61",
                 "id" => 10,
                 "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
             ]
         ];
 
         return $array;
     }

function blogs_list(){

    $getBlogs = getBlogs();
    echo json_encode(['status'=> true, 'data' => $getBlogs]);
    exit();
}

function blogs_detail(){
    $request_body = file_get_contents('php://input');
    $request_body = json_decode($request_body);

    $blogId = $request_body->data->blogId;  
    $getBlogs = getBlogs();

    $blog_dets = [];
    foreach ($getBlogs as $key => $value) {
        if($value['id'] == $blogId){
            $blog_dets = $getBlogs[$key];
        }
    }

    if(!empty($blog_dets)){
        echo json_encode(['status'=> true, 'data' => $blog_dets]);
        exit();
    }else{
        echo json_encode(['status'=> false, 'message' => 'no record found']);
        exit();
    }


    
}