import useApp from "./hook";
import React, { useEffect } from "react";
import CreateContent from "./components/CreateContent";
import { Container, Table } from "react-bootstrap";
import EditContent from "./components/EditContent";

const App = () => {
    const { closeModal, showModal, openModal, getContents, contents, openModalEdit, data_edit, closeModalEdit, showModalEdit, changeStatus } = useApp();

    useEffect(() => {
        getContents();
    }, []);

    console.log(contents);
    return (
        <React.Fragment>
            <Container>
                <div className="col-md-12 mt-5">
                    <h3>Administrador de contenido de Productos</h3>
                </div>
                <div className="col-md-12 mt-3">
                    <button className="btn btn-primary" onClick={openModal}>Crear Contenido</button>
                </div>
                <div className="col-md-12 mt-3">
                    <Table responsive="xl">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Pagina</th>
                                <th>Sección</th>
                                <th>Tipo de contenido</th>
                                <th>Contenido</th>
                                <th>Alias</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                contents && contents.map((item: any, key: any) => (
                                    <tr key={key}>
                                        <td>{item.id}</td>
                                        <td>{item.page.name}</td>
                                        <td>{item.section}</td>
                                        <td>{item.type_content.name}</td>
                                        <td>
                                            {
                                                item.type_content_id === 1 ? (
                                                    <span>{item.content}</span>
                                                ) : (
                                                    <img
                                                        src={item.content}
                                                        alt="content"
                                                        style={{ width: 100, height: 100 }}
                                                    />
                                                )
                                            }
                                        </td>
                                        <td>{item.alt}</td>
                                        <td>
                                            <span
                                                onClick={() => changeStatus(item.id)}
                                                style={{ background: item.status.status_color, padding: 10, borderRadius: 20, color: "#fff", fontWeight: "700", cursor: "pointer" }}
                                            >{item.status.name}</span>
                                        </td>
                                        <td>
                                            <button className="btn btn-success" onClick={() => openModalEdit(item)}>Editar</button>
                                        </td>
                                    </tr>
                                ))
                            }
                        </tbody>
                    </Table>
                </div>
            </Container>
            <CreateContent showModal={showModal} closeModal={closeModal} />
            <EditContent data_edit={data_edit} showModal={showModalEdit} closeModal={closeModalEdit} />
        </React.Fragment>
    );
}

export default App;