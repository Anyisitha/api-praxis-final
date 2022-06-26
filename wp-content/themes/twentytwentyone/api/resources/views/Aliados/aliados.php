<?php

namespace Api\Resources\Views;

class Aliados
{
    /**
     * This function is used from return the html code of the home view in the admin
     * @return void
     */
    public function AliadosView()
    {
        $html = '<!DOCTYPE html>';
        $html .= '<html lang="es">';
        $html .= '<head>';
        $html .= '  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">';
        $html .= '</head>';
        $html .= '<body>';
        $html .= '  <div id="app"></div>';
        $html .= '  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>';
        $html .= '  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>';
        $html .= '  <script src="' . get_template_directory_uri() . '/api/resources/views/aliados/public/js/app.js' . '"></script>';
        $html .= '</body>';
        $html .= '</html>';

        echo $html;
    }
}
