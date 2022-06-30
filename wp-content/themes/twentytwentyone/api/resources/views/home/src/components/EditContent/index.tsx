import { IEditContent } from "../../interfaces";
import React, { FC, useEffect, useState } from "react";
import { Button, Col, Modal, Row } from "react-bootstrap";
import { Controller } from "react-hook-form";
import Select from "react-select";

const EditContent: FC<IEditContent> = ({
  showModal,
  control,
  typeContents,
  closeModal,
  handleSubmit,
  setValue,
  setImage,
  setImageResult,
  image,
  imgDetails,
  data_edit,
  reset,
  handleEditContent,
}) => {
  /** States */
  const [type, setType] = useState<number>(0);

  useEffect(() => {
    reset({
      alt: data_edit.alt,
      section: data_edit.section,
      content: data_edit.content,
      type_content: data_edit.type_content,
      id: data_edit.id,
    });

    setType(data_edit.type_content && data_edit.type_content.id);
    if (data_edit.type_content_id && data_edit.type_content.id === 2) {
      setImageResult(data_edit.content);
    }
  }, [data_edit]);

  return (
    <Modal show={showModal} onHide={closeModal}>
      <Modal.Header closeButton>
        <Modal.Title>Editar Contenido</Modal.Title>
      </Modal.Header>
      <Modal.Body>
        <Row>
          <Col md={12}>
            <Controller
              control={control}
              name="alt"
              rules={{
                required: {
                  value: true,
                  message: "El campo es requerido",
                },
              }}
              render={({ field, fieldState }) => (
                <React.Fragment>
                  <label>Alias del contenido</label>
                  <input
                    className="form-control"
                    name={field.name}
                    value={field.value}
                    onChange={(e: any) => {
                      field.onChange(e);
                    }}
                  />
                  <span style={{ color: "#d50000", fontSize: 12 }}>
                    {fieldState.error?.message}
                  </span>
                </React.Fragment>
              )}
            />
          </Col>
          <Col md={12}>
            <Controller
              control={control}
              name="section"
              rules={{
                required: {
                  value: true,
                  message: "El campo es requerido",
                },
              }}
              render={({ field, fieldState }) => (
                <React.Fragment>
                  <label>Sección a la que va el contenido</label>
                  <input
                    className="form-control"
                    name={field.name}
                    value={field.value}
                    onChange={(e: any) => {
                      field.onChange(e);
                    }}
                  />
                  <span style={{ color: "#d50000", fontSize: 12 }}>
                    {fieldState.error?.message}
                  </span>
                </React.Fragment>
              )}
            />
          </Col>
          <Col md={12}>
            <Controller
              control={control}
              name="type_content"
              rules={{
                required: {
                  value: true,
                  message: "El campo es requerido",
                },
              }}
              render={({ field, fieldState }) => (
                <React.Fragment>
                  <label>Tipo de contenido</label>
                  <Select
                    options={typeContents}
                    name={field.name}
                    onChange={(e: any) => {
                      field.onChange(e);
                      if (e.id === 1) {
                        setImageResult(undefined);
                        setValue("content", undefined);
                        setType(e.id);
                      } else {
                        setType(e.id);
                      }
                    }}
                    value={field.value}
                  />
                  <span style={{ color: "#d50000", fontSize: 12 }}>
                    {fieldState.error?.message}
                  </span>
                </React.Fragment>
              )}
            />
          </Col>
          <Col md={12}>
            <label>Contenido</label>
            <Col md={12}>
              {type === 1 ? (
                <Controller
                  control={control}
                  name="content"
                  rules={{
                    required: {
                      value: true,
                      message: "El campo es requerido",
                    },
                  }}
                  render={({ field, fieldState }) => (
                    <React.Fragment>
                      <textarea
                        className="form-control"
                        name={field.name}
                        value={field.value}
                        onChange={(e: any) => {
                          field.onChange(e);
                        }}
                      />
                      <span style={{ color: "#d50000", fontSize: 12 }}>
                        {fieldState.error?.message}
                      </span>
                    </React.Fragment>
                  )}
                />
              ) : (
                <React.Fragment>
                  <label htmlFor="content" className="btn btn-primary">
                    Upload Image
                  </label>
                  <input
                    type="file"
                    accept="image/*"
                    id="content"
                    onChange={setImage}
                    style={{ display: "none" }}
                  />
                  <br />
                  <span>
                    Solo se aceptan imagenes en formato jpeg, jpg o png
                  </span>
                </React.Fragment>
              )}
            </Col>
            <Col md={12}>
              {image !== undefined && (
                <>
                  <img
                    src={image}
                    alt="Preview Content"
                    style={{ width: 150, height: 150 }}
                  />
                  <br />
                  <span>
                    Dimensiones: {imgDetails.width ? imgDetails.width : 0} x{" "}
                    {imgDetails.height ? imgDetails.height : 0}
                  </span>
                  <br />
                  <span>
                    Tamano: {imgDetails.size ? imgDetails.size : 0} Kb
                  </span>
                </>
              )}
            </Col>
          </Col>
        </Row>
      </Modal.Body>
      <Modal.Footer>
        <Button variant="secondary" onClick={closeModal}>
          Cancel
        </Button>
        <Button variant="primary" onClick={handleSubmit(handleEditContent)}>
          Create Content
        </Button>
      </Modal.Footer>
    </Modal>
  );
};

export default EditContent;
