<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;

class BlogController extends Controller
{
    public function getEntriesBlog(): array
    {
        $blogs = get_posts(array("category" => 5));
        return $this->response(true, ["type" => "success", "content" => "Done."], $blogs);
    }

    public function getAssets(): array
    {
        $blogAssets = array(
            "blog_banner_principal" => ContentPage::where("section", "blog_banner_principal")->whereStatusId(1)->first(),
            "blog_background_recent" => ContentPage::where("section", "secciones")->whereStatusId(1)->first(),
            "blog_number_1" => ContentPage::where("section", "fondo_blog_banner_1")->whereStatusId(1)->first(),
            "blog_number_2" => ContentPage::where("section", "fondo_blog_banner_2")->whereStatusId(1)->first(),
            "blog_number_3" => ContentPage::where("section", "fondo_blog_banner_3")->whereStatusId(1)->first(),
            "blog_number_4" => ContentPage::where("section", "fondo_blog_banner_4")->whereStatusId(1)->first(),
        );

        return $this->response(true, ["type" => "success", "content" => "Done."], $blogAssets);
    }

    public function getRecentPosts(): array
    {
        $recentPosts = wp_get_recent_posts(array(
            "numberposts" => 4,
            "orderby" => "date",
            "category" => 8
        ));

        $posts = [];

        foreach($recentPosts as $value){
            $post = get_post($value["ID"]);
            $image = get_post_thumbnail_id($value["ID"], "full");
            $post->image = wp_get_attachment_image_src($image)[0];
            array_push($posts, $post);
        }

        return $this->response(true, ["type" => "success", "content" => "Done."], $posts);
    }

    public function getPosts()
    {
        $prePosts = get_posts(array(
            "category" => 8
        ));

        $postsArray = [];

        foreach ($prePosts as $post){
            $post_full = get_post($post["ID"]);
            $image = get_post_thumbnail_id($post["ID"], "full");
            $post_full->image = wp_get_attachment_image_src($image)[0];
            array_push($postsArray, $post);
        }

        return $this->response(true, ["type" => "success", "content" => "Done."], $postsArray);
    }
}