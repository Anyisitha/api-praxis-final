<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;

class AliadosController extends Controller
{
    /**
     * This function is used from get all data of home in the db.
     * @return array with the data obtained.
     */
    public function createAliadosContents($request)
    {
        global $wpdb;

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $contentHome = new ContentPage();
            $contentHome->page_id = 4;
            $contentHome->type_content_id = $request["type"];
            $contentHome->section = $request["section"];
            if ($request['type'] == 1) {
                $contentHome->content = $request['content'];
            } else {
                $contentHome->content = $this->uploadImages($request->get_file_params("content")["content"]);
            }
            $contentHome->alt = $request['alt'];
            $contentHome->status_id = 1;
            $contentHome->save();

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }
        if ($status) {
            return $this->response($status, ['type' => 'success', 'content' => 'Done.'], $contentHome);
        } else {
            return $this->response($status, ['type' => 'success', 'content' => 'Ocurrio un problema al momento de crear el contenido.'], $result);
        }
    }

    public function editAliadosContents($request)
    {
        global $wpdb;

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $contentHome = ContentPage::find($request['id']);

            if ($request['is_equal']) {
                $contentHome->page_id = 4;
                $contentHome->type_content_id = $request["type"];
                $contentHome->alt = $request['alt'];
                $contentHome->section = $request["section"];
                $contentHome->status_id = 1;
                $contentHome->save();
            } else {
                $contentHome->page_id = 4;
                $contentHome->section = $request["section"];
                $contentHome->type_content_id = $request["type"];
                if ($request['type'] == 1) {
                    $contentHome->content = $request["content"];
                } else {
                    $contentHome->content = $this->uploadImages($request->get_file_params("content")["content"]);
                }
                $contentHome->alt = $request['alt'];
                $contentHome->status_id = 1;
                $contentHome->save();
            }

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }
        if ($status) {
            return $this->response($status, ['type' => 'success', 'content' => 'Done.'], $contentHome);
        } else {
            return $this->response($status, ['type' => 'success', 'content' => 'Ocurrio un problema al momento de editar el contenido.'], $result);
        }
    }

    public function changeStatus($request)
    {
        global $wpdb;

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $contentHome = ContentPage::find($request['id']);
            $contentHome->status_id = $contentHome->status_id == 1 ? 2 : 1;
            $contentHome->save();

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }
        if ($status) {
            return $this->response($status, ['type' => 'success', 'content' => 'Done.'], $contentHome);
        } else {
            return $this->response($status, ['type' => 'success', 'content' => 'Ocurrio un problema al momento de cambiarle le estado al contenido.'], $result);
        }
    }

    public function getAliadosContents()
    {
        $homeContents = ContentPage::with(['page', 'status', 'type_content'])->wherePageId(4)->get();
        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], $homeContents);
    }
}
