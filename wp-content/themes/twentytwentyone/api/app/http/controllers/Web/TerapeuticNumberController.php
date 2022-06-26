<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;

class TerapeuticNumberController extends Controller
{
    public function getTerapeuticNumberAssets()
    {
        $banner = ContentPage::where("section", "Heridas_banner_1")->wherePageId(2)->whereStatusId(1)->first();
        $background_description = ContentPage::where("section", "background")->wherePageId(2)->whereStatusId(1)->first();
        $description = ContentPage::where("section", "Heridas-text-description")->wherePageId(2)->whereStatusId(1)->first();
        $background_p = ContentPage::where("section", "background-heridas-2")->wherePageId(2)->whereStatusId(1)->first();
        $wounds1 = ContentPage::where("section", "LIKE","%Herida1%")->wherePageId(2)->whereStatusId(1)->get();
        $wounds2 = ContentPage::where("section", "LIKE","%Herida2%")->wherePageId(2)->whereStatusId(1)->get();
        $clasification = ContentPage::where("section", "clasificacion-heridas")->wherePageId(2)->whereStatusId(1)->first();
        $wound_type_description = ContentPage::where("section", "heridas-type")->wherePageId(2)->whereStatusId(1)->first();
        $recomendation_wounds = ContentPage::where("section", "Heridas-recomendation")->wherePageId(2)->whereStatusId(1)->first();
        $remembers_wounds = ContentPage::where("section", "heridas-recordatorio")->wherePageId(2)->whereStatusId(1)->first();
        $terapeutic_content_lavado = ContentPage::where("section", "LIKE", "%heridas-lavado-%")->wherePageId(2)->whereStatusId(1)->get();
        $aux_person = ContentPage::where("section", "persona_herida")->wherePageId(2)->whereStatusId(1)->first();
        $references = ContentPage::where("section", "referencias_banner")->wherePageId(2)->whereStatusId(1)->first();
        $tabs = ContentPage::where("section", "LIKE", "%Heridas-tipo%")->wherePageId(2)->whereStatusId(1)->get();
        $quiq_wounds = ContentPage::where("section", "quirurgicas")->wherePageId(2)->whereStatusId(1)->first();
        $quirurgicas_1 = ContentPage::where("section", "quirurgicas_1")->wherePageId(2)->whereStatusId(1)->first();
        $caracteristicas_cuadro = ContentPage::where("section", "caracteristicas_cuadro")->wherePageId(2)->whereStatusId(1)->first();
        $factoresTitle = ContentPage::where("section", "heridas-factores-titulo")->wherePageId(2)->whereStatusId(1)->first();
        $factoresDescription = ContentPage::where("section", "Heridas-text-description1")->wherePageId(2)->whereStatusId(1)->first();
        $factoresImage = ContentPage::where("section", "heridas-cuadro-1")->wherePageId(2)->whereStatusId(1)->first();
        $factoresSubDescription = ContentPage::where("section", "Heridas-text-description2")->wherePageId(2)->whereStatusId(1)->first();
        $complicacionesTitle = ContentPage::where("section", "Heridas-titulo2")->wherePageId(2)->whereStatusId(1)->first();
        $complicacionesImage = ContentPage::where("section", "Heridas-imagen-12")->wherePageId(2)->whereStatusId(1)->first();
        $Heridas_titulo3 = ContentPage::where("section", "Heridas_titulo3")->wherePageId(2)->whereStatusId(1)->first();
        $Herida_texto_4 = ContentPage::where("section", "Herida-texto-4")->wherePageId(2)->whereStatusId(1)->first();
        $Heridas_imagen_13 = ContentPage::where("section", "Heridas_imagen-13")->wherePageId(2)->whereStatusId(1)->first();
        $Heridas_imagen_14 = ContentPage::where("section", "Heridas_imagen-14")->wherePageId(2)->whereStatusId(1)->first();
        $Heridas_imagen_15 = ContentPage::where("section", "Heridas_imagen-15")->wherePageId(2)->whereStatusId(1)->first();
        $Heridas_texto_17 = ContentPage::where("section", "Heridas_texto-17")->wherePageId(2)->whereStatusId(1)->first();
        $Fondo_Background1 = ContentPage::where("section", "Fondo-Background1")->wherePageId(2)->whereStatusId(1)->first();

        /** Ulceras */
        $Ulceras_Banner_1 = ContentPage::where("section", "Úlceras-Banner-1")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_1 = ContentPage::where("section", "ulceras-imagen-1")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_2 = ContentPage::where("section", "ulceras-imagen-2")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_background = ContentPage::where("section", "ulceras-background-2")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_4 = ContentPage::where("section", "ulceras-imagen-4")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_titulo_1 = ContentPage::where("section", "ulceras-titulo-1")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_text_1 = ContentPage::where("section", "ulceras-text-1")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_6 = ContentPage::where("section", "ulceras-imagen-6")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_titulo_3 = ContentPage::where("section", "ulceras-titulo-3")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_text_2 = ContentPage::where("section", "ulceras-text-2")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_7 = ContentPage::where("section", "ulceras-imagen-7")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_titulo_4 = ContentPage::where("section", "ulceras-titulo-4")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_text_8 = ContentPage::where("section", "ulceras-text-8")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_9 = ContentPage::where("section", "ulceras-imagen-9")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_imagen_10 = ContentPage::where("section", "ulceras-imagen-10")->wherePageId(2)->whereStatusId(1)->first();
        $ulceras_refrencias_1 = ContentPage::where("section", "ulceras-refrencias-1")->wherePageId(2)->whereStatusId(1)->first();

        /** Diabetes */
        $diabetes_banner_1 = ContentPage::where("section", "diabetes-banner-1")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_background_1 = ContentPage::where("section", "diabetes-background-1")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_text_1 = ContentPage::where("section", "diabetes-text-1")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_cuadro = ContentPage::where("section", "LIKE","%diabetes-cuadro%")->wherePageId(2)->whereStatusId(1)->get();
        $diabetes_titulo_2 = ContentPage::where("section", "diabetes-titulo-2")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_text_2 = ContentPage::where("section", "diabetes-text-2")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_1 = ContentPage::where("section", "diabetes-imagen-1")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_cuadrose = ContentPage::where("section", "LIKE","%diabetes-cuadse%")->wherePageId(2)->whereStatusId(1)->get();
        $diabetes_imagen_2 = ContentPage::where("section", "diabetes-imagen-2")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_4 = ContentPage::where("section", "diabetes-imagen-4")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_titulo_1 = ContentPage::where("section", "diabetes-titulo-1")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_titulo_3 = ContentPage::where("section", "diabetes-titulo-3")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_background_2 = ContentPage::where("section", "diabetes-background-2")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_titulo_4 = ContentPage::where("section", "diabetes-titulo-4")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_text_3 = ContentPage::where("section", "diabetes-text-3")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_5 = ContentPage::where("section", "diabetes-imagen-5")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_titulo_5 = ContentPage::where("section", "diabetes-titulo-5")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_text_4 = ContentPage::where("section", "diabetes-text-4")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_6 = ContentPage::where("section", "diabetes-imagen-6")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_text_5 = ContentPage::where("section", "diabetes-text-5")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_7 = ContentPage::where("section", "diabetes-imagen-7")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_images_8 = ContentPage::where("section", "diabetes-images-8")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_9 = ContentPage::where("section", "diabetes-imagen-9")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_titulo_6 = ContentPage::where("section", "diabetes-titulo-6")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_10 = ContentPage::where("section", "diabetes-imagen-10")->wherePageId(2)->whereStatusId(1)->first();
        $diabetes_imagen_11 = ContentPage::where("section", "diabetes-imagen-11")->wherePageId(2)->whereStatusId(1)->first();

        /** Hemorroidal */
        $hemorroidal_banner_1 = ContentPage::where("section", "hemorroidal-banner-1")->wherePageId(2)->whereStatusId(1)->first();
        $hemorroidal_background_1 = ContentPage::where("section", "hemorroidal-background-1")->wherePageId(2)->whereStatusId(1)->first();
        $hemorroidal_text_1 = ContentPage::where("section", "hemorroidal-text-1")->wherePageId(2)->whereStatusId(1)->first();
        $hemorroidal_background_1 = ContentPage::where("section", "hemorroidal-background-1")->wherePageId(2)->whereStatusId(1)->first();
        $hemorroidal_background_referencias = ContentPage::where("section", "hemorroidal-background-referencias")->wherePageId(2)->whereStatusId(1)->first();
        $hemorroidal_background_p = ContentPage::where("section", "hemorroidal-background-p")->wherePageId(2)->whereStatusId(1)->first();
        $artesanal_title = ContentPage::where("section", "artesanal-title")->wherePageId(2)->whereStatusId(1)->first();
        
        $newArray = array(
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo-1")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-text-2")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-1")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo-2")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto-2")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-2")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -3")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-text-3")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-3")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -4")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto -4")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-4")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -5")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto-5")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-6")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -4")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto -4")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-8")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -6")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto-6")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-9")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
            array(
                "title" => ContentPage::where("section", "hemorroidal-titulo -7")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "description" => ContentPage::where("section", "hemorroidal-texto-7")->wherePageId(2)->whereStatusId(1)->first()["content"],
                "image" => ContentPage::where("section", "hemorroidal-imagen-10")->wherePageId(2)->whereStatusId(1)->first()["content"]
            ),
        );
        
        $newArray = array(
            "principal_banner" => $banner,
            "background_description" => $background_description,
            "description" => $description,
            "background_p" => $background_p,
            "wounds1" => $wounds1,
            "wounds2" => $wounds2,
            "clasification" => $clasification,
            "recomendation_wounds" => $recomendation_wounds,
            "remembers_wounds" => $remembers_wounds,
            "wound_type_description" => $wound_type_description,
            "lavado" => $terapeutic_content_lavado,
            "references" => $references,
            "aux_person" => $aux_person,
            "tabs" => $tabs,
            "quiq_wounds" => $quiq_wounds,
            "quirurgicas_1" => $quirurgicas_1,
            "caracteristicas_cuadro" => $caracteristicas_cuadro,
            "factoresTitle" => $factoresTitle,
            "factoresDescription" => $factoresDescription,
            "factoresImage" => $factoresImage,
            "factoresSubDescription" => $factoresSubDescription,
            "complicacionesTitle" => $complicacionesTitle,
            "complicacionesImage" => $complicacionesImage,
            "Heridas_titulo3" => $Heridas_titulo3,
            "Herida_texto_4" => $Herida_texto_4,
            "Heridas_imagen_13" => $Heridas_imagen_13,
            "Heridas_imagen_14" => $Heridas_imagen_14,
            "Heridas_imagen_15" => $Heridas_imagen_15,
            "Heridas_texto_17" => $Heridas_texto_17,
            "Fondo_Background1" => $Fondo_Background1,

            /** Ulceras */
            "ulceras_Banner_1" => $Ulceras_Banner_1,
            "ulceras_imagen_1" => $ulceras_imagen_1,
            "ulceras_imagen_2" => $ulceras_imagen_2,
            "ulceras_background" => $ulceras_background,
            "ulceras_imagen_4" => $ulceras_imagen_4,
            "ulceras_titulo_1" => $ulceras_titulo_1,
            "ulceras_text_1" => $ulceras_text_1,
            "ulceras_imagen_6" => $ulceras_imagen_6,
            "ulceras_titulo_3" => $ulceras_titulo_3,
            "ulceras_text_2" => $ulceras_text_2,
            "ulceras_imagen_7" => $ulceras_imagen_7,
            "ulceras_titulo_4" => $ulceras_titulo_4,
            "ulceras_text_8" => $ulceras_text_8,
            "ulceras_imagen_9" => $ulceras_imagen_9,
            "ulceras_imagen_10" => $ulceras_imagen_10,
            "ulceras_refrencias_1" => $ulceras_refrencias_1,

            /** Diabletes */
            "diabetes_banner_1" => $diabetes_banner_1,
            "diabetes_background_1" => $diabetes_background_1,
            "diabetes_text_1" => $diabetes_text_1,
            "diabetes_cuadro" => $diabetes_cuadro,
            "diabetes_titulo_2" => $diabetes_titulo_2,
            "diabetes_text_2" => $diabetes_text_2,
            "diabetes_imagen_1" => $diabetes_imagen_1,
            "diabetes_cuadrose" => $diabetes_cuadrose,
            "diabetes_image_2" => $diabetes_imagen_2,
            "diabetes_titulo_1" => $diabetes_titulo_1,
            "diabetes_titulo_3" => $diabetes_titulo_3,
            "diabetes_imagen_4" => $diabetes_imagen_4,
            "diabetes_background_2" => $diabetes_background_2,
            "diabetes_titulo_4" => $diabetes_titulo_4,
            "diabetes_text_3" => $diabetes_text_3,
            "diabetes_imagen_5" => $diabetes_imagen_5,
            "diabetes_text_4" => $diabetes_text_4,
            "diabetes_imagen_6" => $diabetes_imagen_6,
            "diabetes_titulo_5" => $diabetes_titulo_5,
            "diabetes_text_5" => $diabetes_text_5,
            "diabetes_imagen_7" => $diabetes_imagen_7,
            "diabetes_images_8" => $diabetes_images_8,
            "diabetes_imagen_9" => $diabetes_imagen_9,
            "diabetes_titulo_6" => $diabetes_titulo_6,
            "diabetes_imagen_10" => $diabetes_imagen_10,
            "diabetes_imagen_11" => $diabetes_imagen_11,

            /** Hemorroidal */
            "hemorroidal_banner_1" => $hemorroidal_banner_1,
            "hemorroidal_background_1" => $hemorroidal_background_1,
            "hemorroidal_text_1" => $hemorroidal_text_1,
            "hemorroidal_content" => $newArray,
            "hemorroidal_background_referencias" => $hemorroidal_background_referencias,
            "hemorroidal-background-p" => $hemorroidal_background_p,
            "artesanal_title" => $artesanal_title
        );

        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], $newArray);
    }
}
