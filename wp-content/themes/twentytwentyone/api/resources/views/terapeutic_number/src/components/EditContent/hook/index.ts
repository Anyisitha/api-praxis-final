import axios from "axios";
import useApp from "../../../hook";
import { useState } from "react";
import { useForm } from "react-hook-form";

const useEditContent = () => {
    /** Controllers */
    const {setShowModalEdit, getContents } = useApp();

    /** Use Form */
    const { control, handleSubmit, reset, setValue } = useForm();

    const [image, setImageResult] = useState<string | undefined>()

    /** Handlers */
    const handleEditContent = (data: any) => {
        let formData = new FormData();
        if (image === data.content) {
            formData.append("is_equal", "true");
            formData.append('alt', data.alt);
            formData.append('type', data.type_content.id);
            formData.append("content", data.content);
            formData.append("section", data.section);
            formData.append("page", "2");
            formData.append("id", data.id);
        } else {
            formData.append('alt', data.alt);
            formData.append('type', data.type_content.id);
            formData.append("content", data.content);
            formData.append("section", data.section);
            formData.append("page", "2");
            formData.append("id", data.id);
        }

        axios.post("http://api-praxis.test/wp-json/admin/terapeutic-number/edit-terapeutic-number-contents", formData)
            .then((res) => {
                const { transaction } = res.data;
                if (transaction.status === true) {
                    setShowModalEdit(false);
                    getContents();
                } else {
                    alert("ocurrio un problema al momento de editar el contenido.");
                }
            }).catch((err) => {
                console.log(err);
            })
    }

    const setImage = (e: any) => {
        let image = e.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onload = (img: any) => {
            setImageResult(img.target.result);
            setValue("content", image);
        }
    }
    return {
        control,
        handleSubmit,
        reset,
        setValue,
        handleEditContent,
        setImageResult,
        image,
        setImage
    };
}

export default useEditContent;