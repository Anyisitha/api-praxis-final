import axios from 'axios';
import { useState } from "react";

const useApp = () => {
    /** States */
    const [showModal, setShowModal] = useState<boolean>(false);
    const [showModalEdit, setShowModalEdit] = useState<boolean>(false);
    const [contents, setContents] = useState<any[]>([]);
    const [data_edit, setDataEdit] = useState([]);

    /** Handlers */
    const openModal = () => setShowModal(true);
    const closeModal = () => setShowModal(false);
    const openModalEdit = (item: any) => {
        let obj = {
            ...item,
            'type_content': { ...item.type_content, label: item.type_content.name, value: item.type_content.id }
        }

        setDataEdit(obj)

        setShowModalEdit(true);
    }
    const closeModalEdit = () => setShowModalEdit(false);

    const getContents = () => {
        axios.get("http://api-praxis.test/wp-json/admin/terapeutic-number/get-terapeutic-number-contents")
            .then((res) => {
                setContents(res.data.data);
            }).catch((err) => {
                console.log(err);
            })
    }

    const changeStatus = (id: number) => {
        axios.post("http://api-praxis.test/wp-json/admin/terapeutic-number/change-status", {id})
        .then((res) => {
            const { transaction } = res.data;
            if(transaction.status === true){
                getContents();
            }
        }).catch((err) => {
            console.log(err);
        })
    }

    return {
        closeModal,
        showModal,
        openModal,
        getContents,
        contents,
        openModalEdit,
        closeModalEdit,
        data_edit,
        showModalEdit,
        setShowModalEdit,
        changeStatus
    };
}

export default useApp;