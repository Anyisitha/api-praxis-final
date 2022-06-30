export interface ICreateContent {
    showModal: boolean;
    closeModal: () => void;
    control: any;
    setValue: any;
    handleSubmit: any;
    typeContents: any;
    handleCreateContent: any;
    image: any;
    setImage: any;
    setImageResult: any;
    imgDetails: any;
}

export interface IEditContent extends ICreateContent {
    data_edit: any;
    showModal: boolean;
    closeModal: () => void;
    control: any;
    setValue: any;
    handleSubmit: any;
    typeContents: any;
    image: any;
    setImage: any;
    setImageResult: any;
    imgDetails: any;
    reset: any;
    handleEditContent: any;
}