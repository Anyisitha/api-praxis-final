import axios from "axios";
import { useState, useEffect } from "react";
import { useForm } from "react-hook-form";

const useApp = () => {
  /** Axios config */
  axios.defaults.baseURL = "https://api.praxispharmaceutical.com.co/wp-json";

  /** Variables */
  const heads = [
    "Id",
    "Pagina",
    "Sección",
    "Tipo de contenido",
    "Contenido",
    "Alias",
    "Estado",
    "Opciones",
  ];

  /** States */
  const [contents, setContents] = useState([]);
  const [typeContents, setTypeContents] = useState([]);
  const [page, setPage] = useState(0);
  const [showModal, setShowModal] = useState<boolean>(false);
  const [showModalEdit, setShowModalEdit] = useState<boolean>(false);
  const [image, setImageResult] = useState<string>();
  const [imgDetails, setImgDetails] = useState({});
  const [data_edit, setDataEdit] = useState({});

  /** Handlers */
  const handleChangePage = (
    e: React.MouseEvent<HTMLButtonElement> | null,
    newPage: number
  ) => {
    setPage(newPage);
  };

  const handleFirstPageButtonClick = (
    e: React.MouseEvent<HTMLButtonElement>
  ) => {
    handleChangePage(e, 1);
  };

  const handleBackButtonClick = (e: React.MouseEvent<HTMLButtonElement>) => {
    handleChangePage(e, page - 1);
  };

  const handleNextButtonClick = (e: React.MouseEvent<HTMLButtonElement>) => {
    handleChangePage(e, page + 1);
  };

  const handleLastPageButtonClick = (
    e: React.MouseEvent<HTMLButtonElement>
  ) => {
    handleChangePage(e, Math.max(0, Math.ceil(contents.length / 10) - 1));
  };

  const getTypeContents = async () => {
    try {
      const res = await axios({
        url: "/admin/home/get-content-types",
        method: "GET",
      });

      const { data } = res.data;

      const types = data.map((item: any) => {
        return { ...item, value: item.id, label: item.name };
      });
      setTypeContents(types);
    } catch (err) {
      console.log(err);
    }
  };

  const getContents = async () => {
    try {
      const res = await axios({
        url: "/admin/products/get-products-contents",
        method: "GET",
      });

      const { data } = res.data;

      setContents(data);
    } catch (err) {
      console.log(err);
    }
  };

  const changeStatus = async (id: number) => {
    try {
      const res = await axios({
        url: "/admin/products/change-status",
        method: "POST",
        data: { id },
      });

      const { transaction } = res.data;

      if (transaction.status === true) {
        getContents();
      } else {
        console.log("ERROR");
      }
    } catch (err) {
      console.log(err);
    }
  };

  const openModal = () => setShowModal(true);

  const closeModal = () => setShowModal(false);

  const handleCreateContent = async (data: any) => {
    try {
      if (data.content !== undefined) {
        let formData = new FormData();
        formData.append("content", data.content);
        formData.append("alt", data.alt);
        formData.append("page", "1");
        formData.append("type", data.type_content.id);
        formData.append("section", data.section);

        const res = await axios({
          url: "/admin/products/create-products-contents",
          method: "POST",
          data: formData,
        });

        const { transaction } = res.data;

        if (transaction.status === true) {
          closeModal();
          getContents();
        } else {
          alert("Debes agregar algun contenido para poder crear el contenido");
        }
      } else {
        alert("Debes agregar algun contenido para poder crear el contenido");
      }
    } catch (err) {
      console.log(err);
    }
  };

  const setImage = (e: any) => {
    let image = e.target.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = (img: any) => {
      let imgR = new Image();
      imgR.src = img.target.result;
      imgR.onload = () => {
        setImgDetails({
          width: imgR.width,
          height: imgR.height,
          size: image.size,
        });
      };
      setImageResult(img.target.result);
      setValue("content", image);
    };
  };

  const handleEditContent = async (data: any) => {
    try {
      let formData = new FormData();
      if (image === data.content) {
        formData.append("is_equal", "true");
        formData.append("alt", data.alt);
        formData.append("type", data.type_content.id);
        formData.append("content", data.content);
        formData.append("section", data.section);
        formData.append("page", "1");
        formData.append("id", data.id);
      } else {
        formData.append("alt", data.alt);
        formData.append("type", data.type_content.id);
        formData.append("content", data.content);
        formData.append("section", data.section);
        formData.append("page", "1");
        formData.append("id", data.id);
      }

      const res = await axios({
        url: "/admin/products/edit-products-contents",
        data: formData,
        method: "POST",
      });

      const { transaction } = res.data;

      if (transaction.status === true) {
        setShowModalEdit(false);
        getContents();
      } else {
        alert("ocurrio un problema al momento de editar el contenido.");
      }
    } catch (err) {
      console.log(err);
    }
  };

  const openModalEdit = (item: any) => {
      setDataEdit(item);
      setShowModalEdit(true)
  }

  /** Use Form */
  const { control, handleSubmit, setValue, reset } = useForm({
    mode: "onChange",
  });

  useEffect(() => {
    getContents();
    getTypeContents();
  }, []);

  return {
    contents,
    heads,
    page,
    typeContents,
    showModal,
    control,
    image,
    imgDetails,
    showModalEdit,
    setImageResult,
    setImage,
    openModal,
    handleChangePage,
    handleFirstPageButtonClick,
    handleBackButtonClick,
    handleNextButtonClick,
    handleLastPageButtonClick,
    changeStatus,
    closeModal,
    handleSubmit,
    setValue,
    handleCreateContent,
    reset,
    handleEditContent,
    setShowModalEdit,
    data_edit,
    openModalEdit
  };
};

export default useApp;