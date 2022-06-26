export interface ICreateContent {
    showModal: boolean;
    closeModal: () => void;
}

export interface IEditContent extends ICreateContent {
    data_edit: any;
}