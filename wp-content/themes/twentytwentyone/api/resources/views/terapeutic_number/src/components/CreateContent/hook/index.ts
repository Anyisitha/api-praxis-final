import axios from "axios";
import useApp from "../../../hook";
import { useEffect, useState } from "react";
import { useForm } from "react-hook-form";

const useCreateContent = () => {
    const { closeModal, getContents } = useApp();

    /** States */
    const [typeContents, setTypeContents] = useState<any[]>([]);
    const [image, setImageResult] = useState();

    /** Use Form */
    const { control, handleSubmit, setValue } = useForm();

    /** Handlers */
    const getTypeContents = () => {
        axios.get("http://api-praxis.test/wp-json/admin/home/get-content-types")
            .then((res: any) => {
                const { data } = res.data;
                const types = data.map((item: any) => {
                    return { ...item, value: item.id, label: item.name }
                })
                setTypeContents(types);
            }).catch((err) => {
                console.log(err);
            })
    }

    const handleCreateContent = (data: any) => {
        if (data.content !== undefined) {
            let formData = new FormData();
            formData.append("content", data.content);
            formData.append("alt", data.alt)
            formData.append("page", "2")
            formData.append("type", data.type_content.id);
            formData.append("section", data.section);

            axios.post("http://api-praxis.test/wp-json/admin/terapeutic-number/create-terapeutic-number-contents", formData)
                .then((res) => {
                    const { transaction } = res.data;
                    if (transaction.status === true) {
                        closeModal();
                        getContents();
                    }else{
                        alert("ocurrio un problema al crear el contenido");
                    }
                }).catch((err) => {
                    console.log(err);
                })
        } else {
            alert("Debes agregar algun contenido para poder crear el contenido")
        }
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

    useEffect(() => {
        getTypeContents();
    }, [])

    return {
        typeContents,
        control,
        handleSubmit,
        handleCreateContent,
        setImage,
        image,
        setImageResult,
        setValue
    };
}

export default useCreateContent;