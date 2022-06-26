<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;
use stdClass;

class HomeController extends Controller
{
    public function getLogo()
    {
        $custom_logo_id = get_theme_mod("custom_logo");
        $image = wp_get_attachment_image_src($custom_logo_id);

        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], ['logo' => $image[0]]);
    }

    public function getMenus()
    {
        $menuLocations = get_nav_menu_locations();
        $navbar_items = wp_get_nav_menu_items($menuLocations["primary"]);
        $child_items = [];
        $newMenu = [];
        foreach ($navbar_items as $key => $item) {
            if ($item->menu_item_parent) {
                array_push($child_items, $item);
                unset($navbar_items[$key]);
            }
        }

        foreach($navbar_items as $item){
            $item->submenus = [];
            foreach($child_items as $key => $child){
                if($child->menu_item_parent == $item->ID){
                    array_push($item->submenus, $child);
                }
            }

            array_push($newMenu, $item);
        }


        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], $newMenu);
    }

    public function getHomeAssets()
    {
        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], ContentPage::wherePageId(1)->whereStatusId(1)->get());
    }
}
